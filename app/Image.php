<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = 'image';
    protected $primaryKey='id';
    
    public static function getImage($idpost){
        $listImage = Image::where('idpost',$idpost)->get();
        return $listImage;
    }

    public static function insertImage($idpost, $link){
        $image = new Image();
        $image->idpost=$idpost;
        $image->link=$link;
        $image->save();
    }
}