<?php

namespace App\Http\Controllers;

use App\User;
use App\FormDana as FormDana;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }
    public function viewUser(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $data =  DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->where('role_user.role_id',1)
                ->select('users.*')
                ->get();
        return view('admin.user.index')->with('data',$data);
    }

    public function updateUserStatus($user_id,$active)
    {
        //Save to db    
        DB::table('users')->where('id',$user_id)->update(['active'=>$active]);
        return redirect('/admin/user')->with('message', 'Success Update Data !');
    }
}
