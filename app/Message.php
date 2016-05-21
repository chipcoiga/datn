<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class message extends Model
{
	protected $table = 'message';
    protected $primaryKey='id';

    public static function getListUserChat($id){
    	$result = Message::select('fromID')->distinct()->where('toID',$id)->get();
    	
    	return $result;
    }
    public static function getListConversation($userID, $curentID){
    	$result = DB::select('SELECT fromUser, toUser, msg FROM message WHERE fromUser = :pr1 and toUser = :pr2 OR fromUser = :pr3 and toUser = :pr4',['pr1'=>$userID, 'pr2'=>$curentID,'pr3'=>$curentID,'pr4'=>$userID]);
    	//var_dump($result);
    	return $result;
    }
    public static function saveMsg($msgSend,$userChatWithSend,$curentUserSend){
        Message::insert(['fromUser'=>$curentUserSend, 'toUser'=>$userChatWithSend, 'msg'=>$msgSend]);
    }
}