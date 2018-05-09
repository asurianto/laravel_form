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

class MessageController extends Controller
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
        $request->user()->authorizeRoles(['admin','user']);
        $user = $request->user();
        if($request->user()->hasAnyRole(['admin'])){
            $data =  DB::table('messages')
            ->join('users','users.id','=','messages.receiver_id')
            ->select('users.name','messages.id','messages.message')
            ->get();
        }
        else{
            $data =  DB::table('messages')
            ->where('receiver_id',$user->id)
            ->get();
            $notif = $this->notification->delete($user->id);
        }
        return view('messages.index')->with('data',$data);
    }

    public function add(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $data =  DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->where('role_user.role_id',1)
            ->select('users.*')
            ->get();
        return view('messages.add')->with('data',$data);
    }

    public function insert(Request $request)
    {
        //Save to db    
        DB::table('messages')->insert(
            [   'message' => $request->input('message'), 
                'receiver_id' => $request->input('receiver'),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ]
        );
        $notif = $this->notification->addOrUpdateNotif($request);
        return redirect('/messages')->with('message', 'Message Sent!');
    }

    public function delete($id)
    {
        //Delete to db    
        DB::table('messages')->where('id',$id)->delete();
        return redirect('/messages')->with('message', 'Message Delete!');
    }
}
