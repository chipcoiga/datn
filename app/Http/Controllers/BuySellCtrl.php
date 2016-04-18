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
			$result = BuySell::searchKey($searchKey);
		}else{
			$result = BuySell::selectTop100();
		}	
		//dd($result);
		return response()->json($result);
	}
}