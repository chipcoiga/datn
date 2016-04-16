<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    protected $table = 'location';
    protected $primaryKey='idLocation';

    
    
    public static function getLocation(){
        $location = Location::get(['locationName']);
        return $location;
    }

    public static function getLocationByLocationName($locationName){
        $location = Location::where('locationName', $locationName)->first();
        return $location;
    }
    /*
    //free
    public static function check_login($email,$password){
        $count= Account::where('email','=',$email)->where('password',$password)->where('isBlock',false)->count();
        if ($count>0)
            return true;
        else 
            return false;
    }

    public static function register_Account($email,$password,$isAdmin=false){
        $account = new Account();
        $account->email=$email;
        $account->password=$password;
        $account->isAdmin=$isAdmin;
        $account->save();
    }

    public static function is_Account_exists($email){
        $count= Account::where('email','=',$email)->count();
        if ($count>0)
            return true;
        else
            return false;
    }

    public static function getIdAccount($email){
        $id = Account::where('email',$email)->select('id')->get();
        return $id[0]->id;
    }
    
    public static function isAdmin($email){
        $id = Account::where('email',$email)->select('isAdmin')->get();
        return $id[0]->isAdmin;
    }
    //getUsers
    public static function getUsers(){
        $listUser=Account::get();
        return $listUser;
    }

    public static function getAllUserAdmin(){
        $listUser=Account::where('isAdmin',false)->get();
        return $listUser;
    }

    //block/un block user

    public static function BlockUser($idUser)
    {
        $account =Account::where('id',$idUser)->first();
        if($account)
        {
            $account->isBlock=true;
            $account->update();
            return true;
        }
        else {
            return false;
        }
    }

    //unblock user
    public static function UnBlockUser($idUser)
    {
        $account =Account::where('id',$idUser)->first();
        if($account)
        {
            $account->isBlock=false;
            $account->update();
            return true;
        }
        else {
            return false;
        }
    }
    
    public static function checkPassword($idAccount,$pass){
        $count= Account::where('id',$idAccount)->where('password',$pass)->count();
        if ($count>0)
            return true;
        else
            return false;
    }
    
    public static function updateNewPassword($idAccount,$newPass){
        $account = Account::find($idAccount);
        if ($account){
            $account->password=$newPass;
            $account->save();
        }
    }
    */
}
