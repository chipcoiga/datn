<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Location;
use App\BuySell;

class Welcome extends Controller
{
    public function _welcome()
    {
       $location = Location::getLocation();
        return view('welcome')->with('location',$location);
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