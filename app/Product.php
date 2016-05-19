<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'producttype';
    protected $primaryKey='id';

    public static function getAllProduct(){
        $listProduct = Product::get();
        return $listProduct;
    }

    public static function updatePriority($type_product)
    {
    	$productType = Product::find($type_product);
    	if($productType)
    	{
    		$productType->priority = $productType->priority + 1;
    		$productType->save();
    	}
    }

    public static function getMaxPriority()
    {
    	$result =  Product::orderBy('priority', 'desc')->first();
    	if(!$result)
    	{
    		$result =  Product::first();
    	}
    	return $result->id;
    }

    
}