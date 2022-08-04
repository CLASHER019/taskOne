<?php 
namespace App\Helpers;
use App\Models\Admin;
use App\Models\User;
use Auth;
class helper{
    public static function AdminInfo(){
    return ['LoggedAdminInfo'=>Admin::where('id', '=', Auth::guard('admin')->user()->id)->first()];        
    }
    public static function userInfo(){
        return ['LoggedUserInfo'=>User::where('id', '=', Auth::guard('user')->user()->id)->first()];
    }
}

?>