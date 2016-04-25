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

    public static function postproduct($poster, $title_product, $type_product, $description_detail, $address_product_lg, $cost_product, $imglink, $mobilephone, $post_latitude, $post_longitude, $city_code){
        //return "result";
        $buysell = new BuySell();
        $buysell->title = $title_product;
        $buysell->description = $description_detail;
        $buysell->cost = $cost_product;
        $buysell->poster = $poster;
        if($imglink){
            $buysell->imglink = $imglink;
        }
        $buysell->postermobile = $mobilephone;
        $buysell->latitude = $post_latitude;
        $buysell->longitude = $post_longitude;
        $buysell->type = $type_product;
        $buysell->place_id = $city_code;
        $buysell->fullAddress = $address_product_lg;
        $buysell->save();
    }

    public static function updateBuyChecker($id, $checker){
        $buysell = BuySell::find($id);
        if($buysell){
            $buysell->checker = $checker;
            $buysell->save();
        }
    }

    public static function searchKey($keyWord,$searchCity,$searchType){
        $results = DB::select('SELECT id, title, imglink, cost, latitude, longitude, issell, created_at FROM buysell WHERE (idLocation = :idLocation) AND (type = :idType) AND (MATCH(title,description) AGAINST(:keyWord))',['idLocation'=>$searchCity,'idType'=>$searchType,'keyWord'=>$keyWord] );
        return $results;
    }

    public static function selectTop100($searchCity,$searchType)
    {
        return BuySell::select('id','title', 'imglink','cost','latitude','longitude','issell','created_at')->where('idLocation',$searchCity)->where('type',$searchType)->take(100)->get();
    }

    public static function getDetailByID($id){
        return BuySell::where('id',$id)->first();
    }
}