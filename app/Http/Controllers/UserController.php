<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Helpers\helper;
class UserController extends Controller
{
    function addUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        
        $created = $user->save();
        if($created){
            return redirect()->route('login')->with('success','Register Successfull');
        }
        else{
            return redirect('register')->with('fail','Sorry, Something went wrong Try Again');
        }
    }

    function checkUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        $data = array(
            'email'=>$request->email,
            'password'=>$request->password
        );

        if(auth()->attempt($data)){
            return redirect('user/dashboard');
        }
        else{
            return redirect()->route('user.login')->with('fail', 'Try again with correct email password');
        }
    }
    function dashboard(){
        $data = helper::userInfo();
        return view('user.dashboard')->with($data);
    }
    function settings(){
        $data = helper::userInfo();
        return view('user.settings')->with($data);
    }
    function profile(){
        $data = helper::userInfo();
        return view('user.dashboard')->with($data);
    }
    function logout(){
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect()->route('login');
        }
        else{
            return redirect()->route('login');
        }
    }
}
