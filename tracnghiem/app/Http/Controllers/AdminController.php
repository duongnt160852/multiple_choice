<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Question;
use App\User;
use App\Topic;
use App\Exam;
use App\Subject;
use Validator;
use Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth as Auth;
class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}

	public function home(){
		$id=Auth::guard('admin')->user()->id;
		$count_question=Question::where([['idadmin',$id],["status","1"]])->count();
		$count_user=User::where("status","!=","3")->count();
		$admin=Auth::guard('admin')->user();
		$count_online=User::where('status',1)->count();
		$alladmin=admin::all();
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.admin.home",["count_question"=>$count_question,"count_user"=>$count_user,"adm"=>$admin,"count_online"=>$count_online,"alladmin"=>$alladmin]);
		else return view("admin.admin.home",["count_question"=>$count_question,"count_user"=>$count_user,"adm"=>$admin,"count_online"=>$count_online,"alladmin"=>$alladmin]);
	}

	public function postAdmin(Request $request){
		$admin=Auth::guard('admin')->user();
		$admin->middlename=$request->middlename;
		$admin->name=$request->name;
		$admin->address=$request->address;
		//$admin->email=$request->email;
		$admin->save();
		return redirect('admin/home')->with('thongbao','update thành công');
	}

	public function taikhoan(){
		return view("admin.admin.taikhoan");
	}

	public function thongbao(){
		return view("admin.admin.thongbao");
	}

	public function logout(){
    	Auth::guard('admin')->logout();
    	return redirect('admin/login');
    }

    public function list(){
		$admin = Admin::where("status","2")->get();
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.admin.list",["admin"=>$admin]);
		else return view("admin.admin.list",["admin"=>$admin]);
	}

	public function getAdd(){
		$admin= Admin::where("status","2")->orderBy('id')->get();
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.admin.add",["admin"=>$admin]);
		else return view("admin.admin.add",["admin"=>$admin]);
	}

	public function postAdd(Request $request){
		$validator=Validator::make($request->all(), 
			[
				"username"=>"required|unique:users,username"
			], 
			[
				"username.unique"=>"MSDT đã tồn tại",
			]);
		if ($validator->fails()) {
			if (Auth::guard('admin')->user()->status=='1') return redirect('sadmin/admin/add')->withErrors($validator);
			else return redirect('admin/admin/add')->withErrors($validator);
		}
		$admin= new Admin;
		$admin->name=$request->name;
		$admin->username=$request->username;
		$admin->email=$request->email;
		$admin->password= bcrypt($request->password);	
		$admin->save();
		if (Auth::guard('admin')->user()->status=='1') return redirect('sadmin/admin/add')->with('thongbao','Thêm thành công');
		else return redirect('admin/admin/add')->with('thongbao','Thêm thành công');
	}

	public function getEdit($id){
        $admin=Admin::find($id);
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.admin.edit",['user'=>$user]);
		else return view("admin.admin.edit",['user'=>$user]);
	}

    public function delete($id){
    	$admin=Admin::find($id);
    	$admin->status=3;
    	$admin->save();
    	if (Auth::guard('admin')->user()->status=='1') return redirect("sadmin/admin/list")->with("thongbao","Xóa thành công");
    	else return redirect("admin/admin/list")->with("thongbao","Xóa thành công");
    }
}
