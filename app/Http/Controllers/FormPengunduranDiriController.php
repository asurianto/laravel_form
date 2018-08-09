<?php

namespace App\Http\Controllers;

use App\User;
use App\FormDana as FormDana;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;

class FormPengunduranDiriController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
      parent::__construct();
    }

    public function addForm(Request $request)
    {   
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();
        // $data =  DB::table('users')
        //         ->leftjoin('form_dana','users.id','=','form_dana.user_id')
        //         ->whereRaw('form_dana.status = 1 and users.id ='.$user->id)
        //         ->select('users.id',DB::raw('SUM(form_dana.dana) as total_dana'))
        //         ->groupBy('users.id')
        //         ->first();

        $data = DB::select('
                select 
                    a.id,
                    sum(b.cicilan_potongan) as total_cicilan
                from users a
                left join (select * from form_dana where status = 1) as b on a.id = b.user_id
                where a.id = :id
                group by a.id
        ',['id'=>$user->id]);

        if ($data[0]->total_cicilan > 0 ){
            return redirect('/')->with('invalid', 'Peminjaman dana belum lunas!');
        } 
        
        return view('pengunduranDiri.addForm');
    }


    public function saveForm(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();

        //Save to db    
        DB::table('form_pengunduran_diri')->insert(
            [   'user_id' => $user->id, 
                'name' => $request->input('name'),
                'alamat' => $request->input('alamat'),
                'alasan' => $request->input('alasan'),
                'status' => 0,
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ]
        );
        
        return redirect('/')->with('message', 'Success Insert Data !');
    }

    
    public function detailForm(Request $request,$id)
    {
        $data = DB::table('form_pengunduran_diri')->where('id',$id)->first();
        return view('pengunduranDiri.detailForm')->with('data',$data);    
    }
}
