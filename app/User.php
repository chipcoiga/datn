<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'user';
    protected $primaryKey='id';

    public static function checkUser($username){
        $user = User::where('username',$username)->first();
        return ($user ? true : false);
    }
    
    public static function getUser($username, $password){
        $user = User::select('id','username', 'isAdmin')->where('username',$username)->where('passhash',$password)->first();
        return $user;
    }

    public static function getAllUser(){
        $listUser = User::get();
        return $listUser;
    }

    public static function getcurentUserMobile($id)
    {
        $mobile =  User::select('sdt')->where('id',$id)->first();
        return $mobile;
    }

    public static function addUser($username, $password, $sdt){
        $user = new User();
        $user->username = $username;
        $user->passhash = $password;
        $user->sdt = $sdt;
        $user->save();
    }
}