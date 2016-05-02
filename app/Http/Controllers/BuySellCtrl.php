<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Location;
use App\BuySell;
use App\Product;
use Session;

class BuySellCtrl extends Controller
{
	public function doSearch(){
		//return response()->json("result");
		$searchKey = $_POST["searchKey"];
		$searchCity = $_POST["searchCity"];
		$searchType = $_POST["searchType"];
		$string = str_replace(' ', '', $searchKey);
		$result = "";
		if("" != $string){
			$result = BuySell::searchKey($searchKey,$searchCity,$searchType);
		}else{
			$result = BuySell::selectTop100($searchCity,$searchType);
		}	
		return response()->json($result);
	}

	public function viewDetail(){
		$id = $_GET["id"];
		$location = Location::getLocation();
        $productTypes=Product::getAllProduct();
		return view('detailProduct')->with('idProduct',$id)->with('location',$location)->with('productTypes',$productTypes)->with('user', Session::get('user'));		
	}
}