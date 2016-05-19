<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function getUserbyID($endUserID)
    {
        $user = User::select('id','username')->where('id',$endUserID)->first();
        //dd($user);
        return $user;
    }

    public static function getListUserFromListID($id){
        $listUser = DB::select('SELECT username from user where username in (SELECT DISTINCT fromUser from message WHERE toUser = :id)',['id'=>$id]);
        //var_dump($listUser);
        return $listUser;
    }

    public static function getIDByUsername($username){
        $id = User::select('id')->where('username',$username)->first();
        return $id->id;
    }
}