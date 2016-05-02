<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Input;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\BuySell;
use App\Image;
use Session;
class PostBuySellCtrl extends Controller
{
	public function dopostproduct(){
		//return response()->json($a);
		if(Session::has('user')){
			//return response()->json(session('user'));
			//return view("welcome");
		}else{
			return response()->json("Bạn hãy đăng nhập trước.");
		}
		// return response()->json("files");
		$poster =Session::get('user');
		$files="";// = $request->file('InputFile');
		$title_product = $_POST['title_product'];
		$type_product = $_POST['type_product'];
		$description_detail = $_POST['description_detail'];
		$address_product_lg = $_POST['address_product_lg'];
		$cost_product = $_POST['cost_product'];
		$mobilephone = $_POST['mobilephone'];
		$post_latitude = $_POST['post_latitude'];
		$post_longitude = $_POST['post_longitude'];
		$city_code = $_POST['city_code'];
		//return response()->json($post_latitude);
		if($address_product_lg){
			//return response()->json($address_product_lg);
		}else{
			$address_product_lg = $_POST['address_product_sm'];
			//return response()->json($address_product_lg+"s");
		}
		if($title_product && $type_product && $address_product_lg && $cost_product && $mobilephone){
			$filename = "";
			
			if ($request->hasFile('InputFile')) {
	    		$files = $request->file('InputFile');
	    		foreach($files as $file){
	    			if($file->getClientOriginalName()){
	    				$filename =$file->getClientOriginalName();
	    				break;
	    			}
	    		}
	    		$result_buysell =BuySell::postproduct($poster, $title_product, $type_product, $description_detail, $address_product_lg, $cost_product, $filename, $mobilephone, $post_latitude, $post_longitude, $city_code);
				foreach($files as $file) {
					if($file->getClientOriginalName()){
						// Set the destination path
						$destinationPath = 'uploads';
						// Get the orginal filname or create the filename of your choice
						$filename = $file->getClientOriginalName();
						// Copy the file in our upload folder
						$file->move($destinationPath, $filename);
						Image::insertImage($result_buysell,$filename);
					}
				}				
				//return response()->json($filename);
			}else{
				$result_buysell =BuySell::postproduct($poster, $title_product, $type_product, $description_detail, $address_product_lg, $cost_product, $filename, $mobilephone, $post_latitude, $post_longitude, $city_code);
			}
			return response()->json("Bạn vừa rao vặt thành công.");
		}else{
			return response()->json("Lỗi rồi, vui lòng thử lại.");
		}	
	}

}