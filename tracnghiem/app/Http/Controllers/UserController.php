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

class UserController extends Controller
{
    //
    public function list(){
		$users = User::where("status","!=","3")->get();
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.user.list",["users"=>$users]);
		else return view("admin.user.list",["users"=>$users]);
	}

	public function getAdd(){
		$subject= Subject::where("status","!=","0")->orderBy('id')->get();
		$topic=Topic::where("status","!=","0")->orderBy('id')->get();
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.user.add",["subject"=>$subject,"topic"=>$topic]);
		else return view("sadmin.user.add",["subject"=>$subject,"topic"=>$topic]);
	}

	public function postAdd(Request $request){
		$validator=Validator::make($request->all(), 
			[
				"name"=>"required",
				"username"=>"required|unique:users,username",
				"date"=>"required",
				"month"=>"required",
				"year"=>"required|regex:/^[0-9]{4}$/",
				"topic"=>"required",
				"exam"=>"required"
			], 
			[
				"name.required"=>"Bạn chưa nhập tên thí sinh",
				"username.required"=>"Bạn chưa nhập MSDT",
				 "username.unique"=>"MSDT đã tồn tại",
				"date.required"=>"Bạn chưa nhập ngày",
				"month.required"=>"Bạn chưa nhập tháng",
				"year.required"=>"Bạn chưa nhập năm",
				"year.regex"=>"Nhập sai năm",
				"topic.required"=>"Bạn chưa nhập chủ đề",
				"exam.required"=>"Bạn chưa nhập đề thi"
			]);
		if ($validator->fails()) {
			if (Auth::guard('admin')->user()->status=='1') return redirect('sadmin/user/add')->withErrors($validator);
			else return redirect('admin/user/add')->withErrors($validator);
		}
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
		if (Auth::guard('admin')->user()->status=='1') return redirect('sadmin/user/add')->with('thongbao','Thêm thành công');
		else return redirect('admin/user/add')->with('thongbao','Thêm thành công');
	}

	public function postAdd1(Request $request){
		if ($request->file==null) return redirect()->back()->with('loi','Không tồn tại file');  
		$file=$request->file('file');
		if($file->getClientOriginalExtension('file')!='xlsx') return redirect()->back()->with('loi','File không đúng định dạng');  
		GLOBAL $validator;
		GLOBAL $a;
		$a=0;
		$validator=Validator::make($request->all(),[],[]);
	    Excel::load(Input::file('file'),function($reader){
	    	GLOBAL $validator;
	    	GLOBAL $a;
        	$reader->each(function($sheet){
        		GLOBAL $validator;
        		$validator=Validator::make($sheet->toArray(), 
					[
						"username"=>"required|unique:users,username",
						"name"=>"required",
						"email"=>"required|email"
					], 
					[
						"username.required"=>"MSDT trống",
						"username.unique"=>"MSDT đã tồn tại",
						"name.required"=>"Họ tên trống",
						"email.required"=>"Email trống",
						"email.email"=>"Email không đúng định dạng"
					]);
				if ($validator->fails()){
					GLOBAL $a;
					$a=0;
					return;
				}
				if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$sheet->toArray()['dob'])){
					GLOBAL $a;
					$a=2;
					return;
				}
				if (!preg_match("/^[1-9]|1[0-9]$/",$sheet->toArray()['idexam'])){
					GLOBAL $a;
					$a=3;
					return;
				}
				if (!preg_match("/^[1-9]|1[0-2]$/",$sheet->toArray()['code'])){
					GLOBAL $a;
					$a=4;
					return;
				}
    			$user=new User;
    			$pass=str_random(10);
    			$user->name=$sheet->toArray()['name'];
	            $user->username=$sheet->toArray()['username'];
	            $user->email=$sheet->toArray()['email'];
	            $user->DoB=$sheet->toArray()['dob'];
	            $user->password=bcrypt($pass);
	            $user->password1=$pass;
	            $user->idExam=$sheet->toArray()['idexam'];
	            $user->code=$sheet->toArray()['code'];
	            $user->save();
	            GLOBAL $a;
	            $a=1;
        	});
        });
        
        if($a==1) return redirect()->back()->with('thongbao','Thêm thành công');    
        if($a==0) return redirect()->back()->withErrors($validator);
        if($a==2) return redirect()->back()->with('loi','Ngày sinh không đúng');
        if($a==3) return redirect()->back()->with('loi','ID đề thi không đúng');
        if($a==4) return redirect()->back()->with('loi','Mã đề thi không đúng');
    }

	public function getEdit($id){
        $user=User::find($id);
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.user.edit",['user'=>$user]);
		else return view("admin.user.edit",['user'=>$user]);
	}

	public function postEdit(Request $request,$id){
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->DoB=$request->year . $request->month . $request->date;
        $user->save();
        if (Auth::guard('admin')->user()->status=='1') return redirect("sadmin/user/edit/".$id)->with('thongbao',"Sửa Thành Công");
        else return redirect("admin/user/edit/".$id)->with('thongbao',"Sửa Thành Công");
    }

    public function delete($id){
    	$user=User::find($id);
    	$user->status="3";
    	$user->save();
    	if (Auth::guard('admin')->user()->status=='1') return redirect("sadmin/user/list")->with("thongbao","Xóa thành công");
    	else return redirect("admin/user/list")->with("thongbao","Xóa thành công");
    }

    
}
