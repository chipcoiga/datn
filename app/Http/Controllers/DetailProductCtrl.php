<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Location;
use App\BuySell;
use App\Product;
use App\Image;

class DetailProductCtrl extends Controller
{
	public function getProductDetail(){
		$id = $_POST["id"];
		$result = BuySell::getDetailByID($id);
		$images=Image::getImage($id);
		return response()->json([$result,$images]);		
	}
}