<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'user';
    protected $primaryKey='id';

    public static function checkUser($email, $password){
        $user = User::where('email',$email)->where('passhash',$password)->first();
        return ($user ? true : false);
    }
    
    public static function getUser($email, $password){
        $user = User::where('email',$email)->where('passhash',$password)->first();
        return $user;
    }

    public static function getAllUser(){
        $listUser = User::get();
        return $listUser;
    }
}