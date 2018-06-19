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

class HomeController extends Controller
{
    protected $notification;

    public function __construct(NotificationController $notification)
    {
      $this->middleware('auth');
      $this->notification = $notification;
      parent::__construct();
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();
        $data = (object) array('dana','pengunduran_diri');
        if($request->user()->hasAnyRole(['user'])){
            $data->dana = DB::table('form_dana')
                            ->where('form_dana.user_id',$user->id)->get();
            $data->pengunduran_diri = DB::table('form_pengunduran_diri')->where('user_id',$user->id)->get();
        }
        else{
            $data->dana =  DB::table('form_dana')                            
                            ->join('users','users.id','=','form_dana.user_id')
                            ->select('form_dana.id','form_dana.name','users.name as user_name','users.nip')
                            ->where('status',0)->get();
            $data->pengunduran_diri =  DB::table('form_pengunduran_diri')                            
                                    ->join('users','users.id','=','form_pengunduran_diri.user_id')
                                    ->select('form_pengunduran_diri.id','form_pengunduran_diri.name','users.name as user_name','users.nip')
                                    ->get();
        }
        return view('admin.home')->with('data',$data);
    }

    public function addForm(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        return view('addForm');
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

        //Save to db    
        DB::table('form_dana')->insert(
            [   'user_id' => $user->id, 
                'name' => $request->input('name'),
                'nip' => $request->input('nip'),
                'area' => $request->input('area'),
                'rekening' => $request->input('rekening'),
                'bank' => $request->input('bank'),
                'dana' => $request->input('dana'),
                'terbilang' => $request->input('terbilang'),
                'keperluan' => $request->input('keperluan'),
                'cicilan' => $request->input('cicilan'),
                'tanggal_dana' => date('Y-m-d H:i:s',strtotime($request->input('tanggal_dana'))),
                'status' => 0,
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ]
        );
        
        return redirect('/')->with('message', 'Success Insert Data !');    
    }

    public function acceptForm($id,$status){
        
        $formDana = DB::table('form_dana')->where('id',$id)->first();
        $data = (object) array('id','status','receiver');
        $data->id = $id;
        $data->status = $status;
        $data->receiver = $formDana->user_id;

        return view('admin.acceptForm')->with('data',$data);
    }

    public function updateAcceptForm($id,$status,Request $request)
    {   
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();
        $message = 'Pengajuan peminjaman ada sudah di setujui, dana akan di trf pada tgl: '.$request->input('dateConfirm');
        
        DB::table('messages')->insert(
            [   'message' => $message, 
                'receiver_id' => $request->input('receiver'),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ]
        );
        $notif = $this->notification->addOrUpdateNotif($request);
        //Save to db    
        DB::table('form_dana')->where('id',$id)->update(['status'=>$status]);

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

    public function detailProfile(Request $request,$id)
    {
        $data = DB::table('users')->where('id',$id)->first();
        return view('admin.detailProfile')->with('data',$data);    
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

    public function show(){
        return view('welcome');
    }
}
