<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\User;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

class LoginController extends Controller
{
    public function getLoginAdmin(){
    	return view("admin/admin/login");
    }

    public function postLoginAdmin(Request $request){
    	if (Auth::guard('admin')->attempt(["username"=>$request->username, "password"=>$request->password,"status"=>"1"])){
    		return redirect('sadmin/home');
    	}
        else if (Auth::guard('admin')->attempt(["username"=>$request->username, "password"=>$request->password,"status"=>"2"])){
            return redirect('admin/home');
        }
    	return redirect()->back()->with("thongbao","Đăng nhập thất bại");
    }

    public function getLoginUser(){
        return view("user/view");
    }

    public function postLoginUser(Request $request){
        if (Auth::attempt(["username"=>$request->username, "password"=>$request->password, "status"=>"0"])){
            $user=Auth::user();
            $user->status=1;
            $user->save();
            return redirect("user/view");
        }
        return redirect()->back()->with("thongbao","Đăng nhập thất bại");
    }
}
