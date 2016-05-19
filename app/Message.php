<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class message extends Model
{
	protected $table = 'message';
    protected $primaryKey='id';

    public static function getListUserChat($id){
    	$result = Message::select('fromID')->distinct()->where('toID',$id)->get();
    	
    	return $result;
    }
}