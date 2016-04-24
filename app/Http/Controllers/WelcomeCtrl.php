<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Location;
use App\BuySell;
use App\Product;

class WelcomeCtrl extends Controller
{
    public function gotoWelcome()
    {      
        return view('welcome');
    }

    public function gotobuysell(){
        $location = Location::getLocation();
        $productTypes=Product::getAllProduct();
        return view('buysell')->with('location',$location)->with('productTypes',$productTypes);
    }

    public function gotoshare(){

    }

    public function gotofindLost(){
        
    }

    public function gotoPostBuySell(){
        $productTypes=Product::getAllProduct();
        return view('postBuySell')->with('productTypes',$productTypes);
    }
}