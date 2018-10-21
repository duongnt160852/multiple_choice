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
class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}

	public function home(){
		return view("admin.admin.home");
	}

	public function taikhoan(){
		return view("admin.admin.taikhoan");
	}

	public function thongbao(){
		return view("admin.admin.thongbao");
	}
}
