<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

class LoginController extends Controller
{
    public function getLogin(){
    	return view("admin/admin/dangnhap");
    }

    public function logout(){
    	Auth::guard('admin')->logout();
    	return redirect()->route('login');
    }
    public function postLogin(Request $request){
    	if (Auth::guard('admin')->attempt(["username"=>$request->username, "password"=>$request->password])){
    		return redirect()->route('trangchu');
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
