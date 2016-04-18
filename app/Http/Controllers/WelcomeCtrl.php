<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Location;
use App\BuySell;
use App\Product;

class WelcomeCtrl extends Controller
{
    public function _welcome()
    {      
        return view('welcome');
    }

    public function gotoBuySell(){
        $location = Location::getLocation();
        $productTypes=Product::getAllProduct();
        //dd($productTypes);
        return view('buysell')->with('location',$location)->with('productTypes',$productTypes);
    }

    public function _searchAction(){
    	$locationName = $_GET['city_list'];
    	$search_key = $_GET['search_key'];
    	if($l)
    	$result=Location::getLocationByLocationName($locationName);
    	if($result){
    		return view(index)->with($result->locationName);
    	}
    	return view('index')->with();
    	
    }

    public function gotoPostBuySell(){
        return view('postBuySell');
    }
    public function _postBuySell(){
        // $title=$_GET['title'];
        // $description=$_GET['description'];
        // $cost=$_GET['cost'];
        // $sdt=$_GET['sdt'];
        // $poster=$_GET['poster'];
        $result=BuySell::searchKey('thuy sy');
        return view('test')->with('location',$result);
    }
    public function test(){
        return view('detailProduct');
    }
}