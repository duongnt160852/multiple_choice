<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

class LoginController extends Controller
{
    public function getLoginAdmin(){
    	return view("admin/admin/login");
    }

    public function postLoginAdmin(Request $request){
    	if (Auth::guard('admin')->attempt(["username"=>$request->username, "password"=>$request->password])){
    		return redirect()->route('home');
    	}
    	return redirect()->back();
    }

    public function getLoginUser(){
        return view("user/view");
    }

    public function postLoginUser(Request $request){
        if (Auth::attempt(["username"=>$request->username, "password"=>$request->password])){
            return redirect("user/view");
        }
        return redirect()->back();
    }

    public function themadmin(){
        $admin= new Admin;
        $admin->ID=1;
        $admin->username="123";
        $admin->password=bcrypt("123");
        $admin->name="123";
        $admin->save();
    }
}
