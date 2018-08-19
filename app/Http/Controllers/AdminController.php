<?php

namespace App\Http\Controllers;

use App\User;
use App\FormDana as FormDana;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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
        // $data =  DB::table('users')
        //         ->join('role_user','users.id','=','role_user.user_id')
        //         ->leftjoin('form_dana','users.id','=','form_dana.user_id')
        //         ->whereRaw('role_user.role_id = 1 and form_dana.status = 1')
        //         ->select('users.id',DB::raw('min(users.name) as name,min(users.nip) as nip,min(users.active) as active,SUM(form_dana.dana) as total_dana'))
        //         ->groupBy('users.id')
        //         ->get();
        $user = $request->user();

        $data = DB::select('
                select 
                    a.id,
                    min(c.role_id) as role_id,
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
                join role_user c on c.user_id = a.id
                where a.id != :id
                group by a.id
        ',['id'=>$user->id]);
        return view('admin.user.index')->with('data',$data);
    }

    public function updateUserStatus($user_id,$active)
    {
        //Save to db    
        DB::table('users')->where('id',$user_id)->update(['active'=>$active]);
        return redirect('/admin/user')->with('message', 'Success Update Data !');
    }

    public function updateUserRole($user_id,$role_id)
    {
        //Save to db    
        DB::table('role_user')->where('user_id',$user_id)->update(['role_id'=>$role_id]);
        return redirect('/admin/user')->with('message', 'Success Update Data !');
    }

    public function indexBanner(Request $request)
    {    
        $request->user()->authorizeRoles(['admin']);
        $data = DB::table('banner')->get();
        return view('admin.banner.index')->with('data',$data);
    }

    
    public function addBanner(Request $request)
    {    
        $request->user()->authorizeRoles(['admin']);
        return view('admin.banner.add');
    }

    
    public function insertBanner(Request $request)
    {    
        $request->user()->authorizeRoles(['admin']);
        $storagePath = Storage::put('/',  $request->file('banner'));
        $storageName = basename($storagePath);
        DB::table('banner')->insert([
            'name'=>$storageName,
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        return redirect('/admin/banner')->with('success','Success Insert Data !');
    }

    
    public function editBanner(Request $request,$id)
    {    
        $request->user()->authorizeRoles(['admin']);
        $data = DB::table('banner')->where('id',$id)->first();

        return view('admin.banner.edit')->with('data',$data);
    }

    
    public function updateBanner(Request $request,$id)
    {    
        $request->user()->authorizeRoles(['admin']);
        $data = DB::table('banner')->where('id',$id)->first();
        Storage::delete('/',  $data->name);
        $storagePath = Storage::put('/',  $request->file('banner'));
        $storageName = basename($storagePath);
        
        DB::table('banner')->where('id',$id)->update([
            'name' => $storageName,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        return redirect('/admin/banner')->with('success','Success Update Data !');
    }

    public function deleteBanner(Request $request,$id)
    {    
        $request->user()->authorizeRoles(['admin']);
        
        $data = DB::table('banner')->where('id',$id)->first();

        Storage::delete('/',  $data->name);
        DB::table('banner')->where('id',$id)->delete();
        return redirect('/admin/banner')->with('success','Success Delete Data !');
    }
}
