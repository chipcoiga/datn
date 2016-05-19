<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Session;

class ChatCtrl extends Controller
{
	public function getListUserChat(){
		$user = Session::get('user');
		//var_dump($user->id);
		// $listFromUser = Message::getListUserChat($user->id);
		// var_dump($listFromUser);
		$listUser = User::getListUserFromListID($user->id);
		//var_dump($listUser);
		return response()->json($listUser);
	}
}
