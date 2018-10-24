<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Question;
use App\User;
use App\Topic;
use App\Exam;
use App\Subject;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth as Auth;
class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}

	public function home(){
		// $admin=auth::guard('admin')->user();
		// $count=question::where('id',$admin->id)->count();
		$count_user=User::all()->count();
		$count_online=User::where("status","đang thi")->count();
		return view("admin.admin.home",["count_user"=>$count_user,"count_online"=>$count_online]);
	}

	public function taikhoan(){
		return view("admin.admin.taikhoan");
	}

	public function thongbao(){
		return view("admin.admin.thongbao");
	}

	public function logout(){
    	Auth::guard('admin')->logout();
    	return redirect()->route('login');
    }
}
