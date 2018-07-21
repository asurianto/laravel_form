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
      parent::__construct();
    }
    public function viewUser(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $data =  DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->leftjoin('form_dana','users.id','=','form_dana.user_id')
                ->whereRaw('role_user.role_id = 1 and form_dana.status = 1')
                ->select('users.id',DB::raw('min(users.name) as name,min(users.nip) as nip,min(users.active) as active,SUM(form_dana.dana) as total_dana'))
                ->groupBy('users.id')
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
