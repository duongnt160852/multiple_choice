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

class UserController extends Controller
{
    //
    public function list(){
		$user = User::paginate(10);
		return view("admin.user.list",["user"=>$user]);
	}

	public function getAdd(){
		$subject= Subject::orderBy('id')->get();
		$topic=Topic::orderBy('id')->get();
		return view("admin.user.add",["subject"=>$subject,"topic"=>$topic]);
	}

	public function postAdd(Request $request){
		$validator=Validator::make($request->all(), 
			[
				"name"=>"required",
				"username"=>"required|unique:users,username",
				"date"=>"required",
				"month"=>"required",
				"year"=>"required"
			], 
			[
				"name.required"=>"Bạn chưa nhập tên thí sinh",
				"username.required"=>"Bạn chưa nhập MSDT",
				 "username.unique"=>"MSDT đã tồn tại",
				"date.required"=>"Bạn chưa nhập ngày",
				"month.required"=>"Bạn chưa nhập tháng",
				"year.required"=>"Bạn chưa nhập năm"
			]);
		if ($validator->fails()) return redirect('admin/user/add')->withErrors($validator);
		$user= new User;
		$user->name=$request->name;
		$user->username=$request->username;
		$user->email=$request->email;
		$user->password= $request->password;	
		$user->password1= $request->password1;
		$user->DoB=$request->year . $request->month . $request->date;
		$user->idExam=$request->exam;
		$user->code=$request->code;
		$user->save();
		$user=User::where("username",$request->username)->get()->first();
		$user->password=bcrypt($user->password);
		$user->save();
		return redirect('admin/user/add')->with('thongbao','Thêm thành công');
	}
}
