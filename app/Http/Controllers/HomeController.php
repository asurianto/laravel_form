<?php

namespace App\Http\Controllers;

use App\User;
use App\FormDana as FormDana;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class HomeController extends Controller
{
    protected $notification;
    private $excel;

    public function __construct(NotificationController $notification,Excel $excel)
    {
      $this->middleware('auth');
      $this->notification = $notification;
      $this->excel = $excel;
      parent::__construct();
    }
    
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();
        $data = (object) array('dana','pengunduran_diri');
        if($request->user()->hasAnyRole(['user'])){
            $data->dana = DB::table('form_dana')
                            ->where('form_dana.user_id',$user->id)
                            ->select('form_dana.id','form_dana.name','form_dana.dana_potongan as dana','form_dana.tanggal_dana','form_dana.status')
                            ->get();
            $data->pengunduran_diri = DB::table('form_pengunduran_diri')->where('user_id',$user->id)->get();
        }
        else{
            $data->dana =  DB::table('form_dana')                            
                            ->join('users','users.id','=','form_dana.user_id')
                            ->select('form_dana.id','form_dana.name','users.name as user_name','users.nip','form_dana.dana_potongan as dana','form_dana.tanggal_dana')
                            ->where('status',0)->get();
            $data->pengunduran_diri =  DB::table('form_pengunduran_diri')                            
                                    ->join('users','users.id','=','form_pengunduran_diri.user_id')
                                    ->select('form_pengunduran_diri.id','form_pengunduran_diri.name','users.name as user_name','users.nip','form_pengunduran_diri.status')
                                    ->where('status',0)
                                    ->get();
        }
        return view('admin.home')->with('data',$data);
    }

    public function addForm(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $data = DB::table('type_peminjaman')->get();
        return view('addForm')->with('data',$data);
    }

    public function detailForm(Request $request,$id)
    {
        $data = DB::table('form_dana')->where('id',$id)->first();
        return view('admin.detailForm')->with('data',$data);    
    }

    public function saveForm(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();
        $type_peminjaman = DB::table('type_peminjaman')->where('id',$request->input('limit_peminjaman'))->first();
        $limit_peminjaman = $type_peminjaman->limit_peminjaman;

        if($request->input('dana') > $limit_peminjaman){
            return back()->with('invalid','Limit peminjaman sebesar:Rp.'.number_format($limit_peminjaman,2,',','.'));
        }
        //Save to db    
        DB::table('form_dana')->insert(
            [   'user_id' => $user->id,
                'type_peminjaman_id' =>  $request->input('limit_peminjaman'),
                'name' => $request->input('name'),
                'nip' => $request->input('nip'),
                'area' => $request->input('area'),
                'rekening' => $request->input('rekening'),
                'bank' => $request->input('bank'),
                'dana' => $request->input('dana'),
                'dana_potongan' => $request->input('dana'),
                'terbilang' => $request->input('terbilang'),
                'keperluan' => $request->input('keperluan'),
                'cicilan' => $request->input('cicilan'),
                'cicilan_potongan' => $request->input('cicilan'),
                'tanggal_dana' => date('Y-m-d H:i:s',strtotime($request->input('tanggal_dana'))),
                'status' => 0,
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ]
        );
        
        return redirect('/')->with('message', 'Success Insert Data !');    
    }

    public function acceptForm($id,$status,$type_form){
        $data = (object) array('id','status','type_forms','receiver','username','total_dana');
        if($type_form == 'dana'){
            $form = DB::table('form_dana')->where('id',$id)->first();
            $data->total_dana = $form->dana;
        }
        else{        
            $form = DB::table('form_pengunduran_diri')->where('id',$id)->first();
            $user = DB::table('users')->where('id',$form->user_id)->first();
            $data->username = $user->name;
        }
        $data->id = $id;
        $data->status = $status;
        $data->type_form = $type_form;
        $data->receiver = $form->user_id;
       
        return view('admin.acceptForm')->with('data',$data);
    }

    public function updateAcceptForm($id,$status,$type_form,Request $request)
    {   
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();
        if($type_form == 'dana'){
            $message = 'Pengajuan peminjaman dana sudah di setujui, dana akan di trf pada tgl: '.$request->input('dateConfirm');
                
            DB::table('messages')->insert(
                [   'message' => $message, 
                    'receiver_id' => $request->input('receiver'),
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString()
                ]
            );
            $notif = $this->notification->addOrUpdateNotif($request);
            //Save to db    
            DB::table('form_dana')->where('id',$id)->update(['status'=>$status,'dana'=>$request->input('dana_transfer'),'dana_potongan'=>$request->input('dana_transfer')]);
        }
        else{
            $message = 'Pengajuan pengunduran diri sudah di setujui';
            DB::table('messages')->insert(
                [   'message' => $message, 
                    'receiver_id' => $request->input('receiver'),
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString()
                ]
            );
            $notif = $this->notification->addOrUpdateNotif($request);
            DB::table('form_pengunduran_diri')->where('id',$id)->update(['status'=>$status]);
            DB::table('users')->where('id',$request->input('receiver'))->update(['active'=>0]);
        }
        
        return redirect('/')->with('message', 'Success Update Data !');
    }

    
    public function updateRejectForm($id,$status,Request $request)
    {   
        
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();

        //Save to db    
        DB::table('form_dana')->where('id',$id)->update(['status'=>$status]);
        
        return redirect('/')->with('message', 'Success Update Data !');
    
    }

    public function excelReportPeminjamanForm(Request $request){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function detailProfile(Request $request,$id)
    {
        $data = DB::select('
                        select 
                            a.id,
                            min(a.name) as name,
                            min(a.email) as email,
                            min(a.nip) as nip,
                            min(a.active) as active,
                            min(a.address) as address,
                            min(a.area) as area,
                            min(a.rekening) as rekening,
                            min(a.bank) as bank,
                            min(a.campus) as campus,
                            min(a.dop) as dop,
                            min(a.dob) as dob,
                            min(a.post_code) as post_code,
                            min(a.phone_home) as phone_home,
                            min(a.phone) as phone,
                            sum(b.dana_potongan) as total_dana
                        from users a
                        left join (select * from form_dana where status = 1) as b on a.id = b.user_id
                        where a.id = :id
                        group by a.id
                ',['id'=>$id]);
        return view('admin.detailProfile')->with('data',$data[0]);    
    }

    public function editProfile(Request $request,$id)
    {
        $data = DB::table('users')->where('id',$id)->first();
        return view('admin.editProfile')->with('data',$data);    
    }

    public function updateProfile($id,Request $request)
    {   
        
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();
        $data = $request;
        //Save to db    
        DB::table('users')->where('id',$id)->update([
            'name' => $data['name'],
            'area' => $data['area'],
            'campus' => $data['campus'],
            'dop' => $data['dop'],
            'dob' => date('Y-m-d',strtotime($data['dob'])),
            'address' => $data['address'],
            'post_code' => $data['post_code'],
            'phone_home' => $data['phone_home'],
            'phone' => $data['phone'],
            'rekening' => $data['rekening'],            
            'bank' => $data['bank'],
            'email' => $data['email']
        ]);
        
        return redirect('/profile/'.$id)->with('message', 'Success Update Profile !');
    
    }

    public function historyForm(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $user = $request->user();
        $data = (object) array('dana','pengunduran_diri');
        $data->dana =  DB::table('form_dana')                            
                            ->join('users','users.id','=','form_dana.user_id')
                            ->select('form_dana.id','form_dana.name','users.name as user_name','users.nip','form_dana.dana_potongan as dana','form_dana.status')
                            ->whereIn('status',[1,2])->get();
        $data->pengunduran_diri =  DB::table('form_pengunduran_diri')                            
                            ->join('users','users.id','=','form_pengunduran_diri.user_id')
                            ->select('form_pengunduran_diri.id','form_pengunduran_diri.name','users.name as user_name','users.nip','form_pengunduran_diri.status')
                            ->whereIn('status',[1,2])
                            ->get();
        return view('admin.history')->with('data',$data);
    }

    public function show(){
        return view('welcome');
    }
}
