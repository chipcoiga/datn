<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Input;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\BuySell;

class PostBuySellCtrl extends Controller
{
	public function dopostproduct(Request $request){
		$a=3;
		$b=4;
		session(['user'=> $b]);
		//return response()->json($a);
		if(session()->has('user')){
			//return response()->json(session('user'));
			//return view("welcome");
		}
		// return response()->json("files");
		$poster =session('user');
		$files;// = $request->file('InputFile');
		$title_product = $_POST['title_product'];
		$type_product = $_POST['type_product'];
		$description_detail = $_POST['description_detail'];
		$address_product_lg = $_POST['address_product_lg'];
		//$address_product_sm = $_POST['address_product_sm'];
		$cost_product = $_POST['cost_product'];
		$mobilephone = $_POST['mobilephone'];
		$post_latitude = $_POST['post_latitude'];
		$post_longitude = $_POST['post_longitude'];
		$city_code = $_POST['city_code'];
		//return response()->json("files");
		if($title_product && $type_product && $address_product_lg && $cost_product && $mobilephone){
			//return response()->json("files");
			$imglink;
			if ($request->hasFile('InputFile')) {
	    		$files = $request->file('InputFile');
				foreach($files as $file) {
					if($file){
						$imglink = $file->getClientOriginalName();
						// Set the destination path
						$destinationPath = 'uploads';
						// Get the orginal filname or create the filename of your choice
						$filename = $file->getClientOriginalName();
						// Copy the file in our upload folder
						$file->move($destinationPath, $filename);
					}
				}
			}else{

			}
			//return response()->json("files");
			$result =BuySell::postproduct($poster, $title_product, $type_product, $description_detail, $address_product_lg, $cost_product, $imglink, $mobilephone, $post_latitude, $post_longitude, $city_code);
			return response()->json($result);
		}else{

		}
		//$InputFile_1 = $_FILES['InputFile']['name'];
		
		
		return response()->json($a);
	}

}