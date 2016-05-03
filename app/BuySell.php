<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class buysell extends Model
{
    protected $table = 'buysell';
    protected $primaryKey='id';

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
        return DB::getPdo()->lastInsertId();
    }

    public static function updateBuyChecker($id, $checker){
        $buysell = BuySell::find($id);
        if($buysell){
            $buysell->checker = $checker;
            $buysell->save();
        }
    }

    public static function searchKey($keyWord,$searchCity,$searchType){
        $results = DB::select('SELECT id, title, imglink, cost, latitude, longitude, created_at FROM buysell WHERE (place_id = :idLocation) AND (checker <> 0) AND (type = :idType) AND (MATCH(title,description) AGAINST(:keyWord IN BOOLEAN MODE))',['idLocation'=>$searchCity,'idType'=>$searchType,'keyWord'=>$keyWord] );
        return $results;
    }

    public static function selectTop100($searchCity,$searchType)
    {
        return BuySell::select('id','title', 'imglink','cost','latitude','longitude','created_at')->where('place_id',$searchCity)->where('type',$searchType)->where('checker','<>',0)->take(100)->get();
    }

    public static function getDetailByID($id){
        return BuySell::where('id',$id)->first();
    }

    public static function getListUnCheck(){
        $result = DB::select('SELECT u.username, u.sdt, b.id, b.title, b.description, b.cost, b.created_at, p.type FROM buysell b INNER JOIN user u ON b.poster = u.id INNER JOIN producttype p ON b.type = p.id WHERE b.created_at >= (now() - INTERVAL 60 DAY) AND b.checker = 0');
        //var_dump($result);
        return $result;
    }

    public static function acceptPost($listIDPost)
    {
        DB::table('buysell')->whereIn('id', $listIDPost)->update(['checker' => 1]);
    }

    public static function unAcceptPost($listIDPost)
    {
        DB::table('buysell')->whereIn('id', $listIDPost)->update(['checker' => 0]);
    }

    public static function deletePost($listIDPost)
    {
        DB::table('buysell')->whereIn('id', $listIDPost)->delete();
    }
    public static function getListOldest()
    {
        $result = DB::select('SELECT u.username, u.sdt, b.id, b.title, b.description, b.cost, b.created_at, p.type FROM buysell b INNER JOIN user u ON b.poster = u.id INNER JOIN producttype p ON b.type = p.id WHERE b.created_at < (now() - INTERVAL 60 DAY)');
        return $result;
    }

    public static function getListChecked(){
        $result = DB::select('SELECT u.username, u.sdt, b.id, b.title, b.description, b.cost, b.created_at, p.type FROM buysell b INNER JOIN user u ON b.poster = u.id INNER JOIN producttype p ON b.type = p.id WHERE b.checker <> 0');
        return $result;
    }

}