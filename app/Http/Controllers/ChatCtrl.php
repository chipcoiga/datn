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
		$listUser = User::getListUserFromListID($user->username);
		//var_dump($listUser);
		return response()->json($listUser);
	}

	public function showConversation(){
		$username = $_POST['username'];
		$user = Session::get('user');
		//var_dump($userID);
		$conversation = Message::getListConversation($username, $user->username);
		//var_dump($conversation);
		return $conversation;
	}
}
