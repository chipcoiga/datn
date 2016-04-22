<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Location;
use App\BuySell;
use App\Product;

class BuySellCtrl extends Controller
{
	public function doSearch(){
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
		$result = BuySell::getDetailByID($id);
		if($result){
			return view('detailProduct')->with('data',$result);
		}else{
			return view('error');
		}		
	}
}