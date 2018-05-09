<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;

class NotificationController extends Controller
{
    private $userId;

    public function __construct()
    {
      $this->middleware('auth');
    }


    public function addOrUpdateNotif(Request $request)
    {
        $data = $this->getNotif($request);
        if($data == null){
            $data = $this->insert($request,$this->userId);
        }
        else{
            $data = $this->update($this->userId,$data->count);
        }
        return $data;
    }

    public function getNotif(Request $request){
        $this->userId = $request->input('receiver');
        $data = DB::table('notification')->where('user_id',$this->userId)->first();
        return $data;
    }

    public function insert(Request $request,$user_id)
    {
        //Save to db    
        $data = DB::table('notification')->insert(
            [   'user_id' => $user_id, 
                'count' => 1,
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ]
        );
        return $data;
    }

    public function update($user_id,$count)
    {
        //Save to db    
        $data = DB::table('notification')->where('user_id',$user_id)->update(['count'=>$count+1]);
        return $data;
    }

    public function delete($user_id)
    {
        $data = DB::table('notification')->where('user_id',$user_id)->update(['count'=>0]);
        return $data;
    }
}
