<?php

namespace App\Http\Controllers;

use App\User;
use App\FormDana as FormDana;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;

class SimpananController extends Controller
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
        if($request->user()->hasAnyRole(['user'])){
            $data = DB::select('
                    select 
                        a.id,
                        a.dana as total_simpanan
                    from simpanan a 
                    join users b on a.user_id = b.id
                    where a.id = :id
            ',['id'=>$user->id]);
            if (count($data) < 1)  {
                $data[] = (object) array('id','total_simpanan');
                $data[0]->id = 0;
                $data[0]->total_simpanan = 0;
            }
        }
        else{
            $data = DB::select('
                    select 
                        a.id,
                        b.nip,
                        b.name,
                        a.dana as total_simpanan
                    from simpanan a
                    join users b on a.user_id = b.id
                    ');
        }
        return view('simpanan.index')->with('data',$data);
    }

    public function add(Request $request)
    {   
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();
        $data = DB::select('
                select 
                    a.id,
                    a.nip
                from users a
                join role_user c on a.id = c.user_id
                where c.role_id = 1 and a.id NOT IN (select user_id from simpanan)
        ');
        return view('simpanan.add')->with('data', $data);
    }

    public function edit(Request $request,$id)
    {   
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();
        $data = DB::select('
                select 
                    a.id,
                    a.dana,
                    b.nip
                from simpanan a
                join users b on a.user_id = b.id
                where a.id = :id  
        ',['id'=>$id]);
        return view('simpanan.edit')->with('data', $data[0]);
    }


    public function save(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();

        //Save to db    
        DB::table('simpanan')->insert(
            [   'user_id' => $request->input('user'), 
                'dana' => $request->input('dana'),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ]
        );
        
        return redirect('/list-simpanan')->with('message', 'Success Insert Data !');
    }

    public function update(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();

        //Save to db    
        DB::table('simpanan')->where('id',$id)->update(
            [   'dana' => $request->input('dana'),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ]
        );
        
        return redirect('/list-simpanan')->with('message', 'Success Update Data !');
    }
}
