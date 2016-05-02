<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Location;
use App\BuySell;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Session;

class WelcomeCtrl extends Controller
{

    public function gotoWelcome()
    {   
        return view('welcome')->with('user',Session::get('user'));
    }

    public function gotobuysell(){
        $location = Location::getLocation();
        $productTypes=Product::getAllProduct();
        return view('buysell')->with('location',$location)->with('productTypes',$productTypes)->with('user',Session::get('user'));
    }

    public function gotoshare(){

    }

    public function gotofindLost(){
        
    }

    public function gotoPostBuySell(){
        $productTypes=Product::getAllProduct();
        return view('postBuySell')->with('productTypes',$productTypes)->with('user', Session::get('user'));
    }

    public function dologin(){
        //return response()->json("gfgd");
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = "";
        if($username && $password){
            $result = User::getUser($username, $password);
            if($result){
                Session::set('user',$result);
                return response()->json([true, Session::get('user')]);
            }
        }
        return response()->json([false, Session::get('user')]);     
    }

    public function doregister(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $sdt = $_POST['sdt'];
        $result = "";
        if($username && $password && $repassword && $sdt){
            if(User::checkUser($username)){
                return response()->json([false, $result]);
            }else{
                User::addUser($username, $password, $sdt);
                $result = $username;
            }           
        }
        return response()->json([true, $result]);
    }

    public function dologout(){
        Session::forget('user');
        return view('welcome');
    }
}