<?php

namespace App\Http\Controllers;
use App\Http\Requests;
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
}
