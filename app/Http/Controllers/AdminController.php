<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Helpers\helper;
class AdminController extends Controller
{
    function addAdmin(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12',
        ]);
        $admin = new Admin;
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=Hash::make($request->password);
        $save = $admin->save();
        if($save){
            return back()->with('success', 'Account created successfuly in database');
        }
        else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    
    function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        $data = array(
            'email' => $request->email,
            'password' => $request->password
        );
        
        if(Auth::guard('admin')->attempt($data))
        {
            return redirect ('/admin/dashboard');
        }
        else{
            return back()->with('fail', 'Try again, password don not Match');
        }



        // Custom old way of checking user login
        // $userinfo= Admin::where('email', '=', $request->email)->find();
        // $userinfo= Admin::where('email', '=', $request->email)->first();
        // if(!$userinfo)
        // {
        //     return back()->with('fail','We do not recognize your email');
        // }
        // else
        // {
        //     if(Hash::check($request->password, $userinfo->password))
        //     {
        //         // $request->session()->put('loggeduser' , $userinfo->id);
        //         // return redirect ('/admin/dashboard');
        //         $request->Auth::guard('admin')->put('loggeduser' , $userinfo->id);
        //         return $request;
        //     }
        //     else 
        //     {
        //         return back()->with('fail', 'Try again, password don not Match');
        //     }
        // }

    }
    function dashboard()
    {
        $data = helper::adminInfo();
        return view('admin.dashboard',$data);        
    }
    function settings()
    {
        $data = helper::adminInfo();
        return view('admin.settings',$data);
    }

    function profile()
    {
        $data = helper::adminInfo();
        return view('admin.profile',$data);
    }

    function staff()
    {
        $data = helper::adminInfo();
        return view('admin.staff',$data);
    }

    function logout()
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        }
        else{
            return redirect()->route('logout');
        }
    }
}
