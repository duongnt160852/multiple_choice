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
		$count_user=User::where("status","!=","3")->count();
		$count_online=User::where("status","1")->count();
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

    public function import() 
    {
        Excel::load(Input::file('file'),function($reader){
        	$reader->each(function($sheet){
        		foreach ($sheet->toArray() as $row) {
        			$user=new User;
        			$pass=str_random(10);
        			$user->name=$row[0];
		            $user->username=$row[1];
		            $user->email=$row[2];
		            $user->DoB=$row[3];
		            $user->password=bcrypt($pass);
		            $user->password1=$pass;
		            $user->idExam=$row[4];
		            $user->code=$row[5];
		            $user->save();
        		}
        	});
        });
    }
}
