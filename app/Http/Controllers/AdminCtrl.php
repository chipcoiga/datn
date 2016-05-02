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
}