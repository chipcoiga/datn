<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Keyword extends Model
{
	protected $table = 'keyword';
    protected $primaryKey='id';
    public static function getListKey(){
    	$result = Keyword::get();
    	return $result;
    }
}