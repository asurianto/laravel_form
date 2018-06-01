<?php

namespace App\Http\Controllers;

use App\User;
use App\FormDana as FormDana;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
      parent::__construct();
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();
        $data = (object) array('dana','pengunduran_diri');
        if($request->user()->hasAnyRole(['user'])){
            $data->dana = DB::table('form_dana')->where('user_id',$user->id)->get();
            $data->pengunduran_diri = DB::table('form_pengunduran_diri')->where('user_id',$user->id)->get();
        }
        else{
            $data->dana =  DB::table('form_dana')->where('status',0)->get();
            $data->pengunduran_diri =  DB::table('form_pengunduran_diri')->get();
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

    public function updateForm($id,$status,Request $request)
    {   
        
        $request->user()->authorizeRoles(['admin', 'user']);
        // exit($id);
        $user = $request->user();

        //Save to db    
        DB::table('form_dana')->where('id',$id)->update(['status'=>$status]);
        
        return redirect('/')->with('message', 'Success Update Data !');
    
    }

    public function show(){
        return view('welcome');
    }
}
