<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Input;
use Illuminate\Http\Request;
use Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PostBuySellCtrl extends Controller
{
	public function dopostproduct(Request $request){
		// $input = Input::all();
		$files;// = $request->file('InputFile');
		$address_product_lg = $_POST['address_product_sm'];
		//$InputFile_1 = $_FILES['InputFile']['name'];
		if ($request->hasFile('InputFile')) {
    		$files = $request->file('InputFile');
		}else{
			$files="ffd";
		}
		if($files){
			foreach($files as $file) {
				if($file){
					// Set the destination path
					$destinationPath = 'uploads';
					// Get the orginal filname or create the filename of your choice
					$filename = $file->getClientOriginalName();
					// Copy the file in our upload folder
					$file->move($destinationPath, $filename);
				}
			}
		}
		//$file = $file->getClientOriginalExtension();
		//get data
		//$input = Input::file('InputFile_1');
		//  dd(Input::file('InputFile_1'));
		return response()->json($files);
	}

}