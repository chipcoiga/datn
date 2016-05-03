<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Location;
use App\BuySell;
use App\Product;
use App\User;
use Session;

class AdminCtrl extends Controller
{
	public function domanagement(){
		if(Session::has('user')){
			if(Session::get('user')->isAdmin){
				return view('adminmanagement')->with('user', Session::get('user'));
			}
		}else{
			return view('welcome')->with('user',Session::get('user'));
		}
	}

	public function getListPostFirstTime(){
		$result = BuySell::getListUnCheck();
		//var_dump($result);
		return response()->json($result);
	}

	public function doactionaccept()
	{
		$listIDPost=$_POST['listchecked'];
		$action_type = $_POST['action_type'];
		//1: duyet
		//2: khong duyet
		//3: delete bai
		//var_dump($action_type);
		if($action_type == 1){
			BuySell::acceptPost($listIDPost);
		}else if($action_type == 2){
			BuySell::unAcceptPost($listIDPost);
		}else{
			BuySell::deletePost($listIDPost);
		}
		return response()->json($listIDPost);
	}

	public function load_byType(){
		$type_filter = $_POST['type_filter'];
		$result;
		if($type_filter == 1){
			$result = BuySell::getListUnCheck();
		}else if($type_filter == 2){
			$result = BuySell::getListOldest();
		}else if($type_filter == 3){

		}else if($type_filter == 4){
			$result = BuySell::getListChecked();
		}

		return response()->json($result);
	}
}