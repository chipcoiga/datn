<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class buysell extends Model
{
    protected $table = 'buysell';
    protected $primaryKey='id';
    
    public static function insertBuy($checker, $poster, $title, $description, $postermobile, $cost, $latitude, $longitude, $type, $issell){
        $buysell = new BuySell();
        if($checker>0){
            $buysell->checker = $checker;
        }       
        $buysell->poster = $poster;
        $buysell->title = $title;
        $buysell->description = $description;
        $buysell->postermobile = $postermobile;
        $buysell->cost = $cost;
        $buysell->latitude = $latitude;
        $buysell->longitude = $longitude;
        $buysell->type = $type;
        $buysell->issell = $issell;
        $buysell->save();
    }

    public static function updateBuyChecker($id, $checker){
        $buysell = BuySell::find($id);
        if($buysell){
            $buysell->checker = $checker;
            $buysell->save();
        }
    }

    public static function searchKey($keyWord){
        $results = DB::select('SELECT * FROM buysell WHERE MATCH(title,description) AGAINST(:keyWord)',['keyWord'=>$keyWord] );
        return $results;
    }

    public static function selectTop100()
    {
        return BuySell::take(100)->get();
    }
}