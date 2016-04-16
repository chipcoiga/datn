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
}