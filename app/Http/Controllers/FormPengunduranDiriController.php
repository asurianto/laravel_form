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
