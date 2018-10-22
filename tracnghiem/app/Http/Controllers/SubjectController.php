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

class SubjectController extends Controller
{
    //
    public function __construct(){
		$this->middleware('auth:admin');
	}

	public function list(){
		$subject=Subject::paginate(10);
		return view("admin.subject.list",['subject'=>$subject]);
	}

    public function getAdd(){
		return view("admin.subject.add");
	}

	public function postAdd(Request $request){
		$validator=Validator::make($request->all(), 
			[
				"name"=>"unique:subjects,name"
			], 
			[
				"name.unique"=>"Môn thi đã tồn tại"
			]);
		if ($validator->fails()) return redirect('admin/subject/add')->withErrors($validator);
		$subject= new Subject;
		$subject->name=$request->name;
		$subject->save();
		return redirect('admin/subject/add')->with('thongbao',"Thêm thành công");
	}

	public function getEdit($id){
		$subject=Subject::find($id);
		return view('admin.subject.edit',['subject'=>$subject]);
	}

	public function postEdit(Request $request,$id){
		$subject=Subject::find($id);
        $subject->name=$request->subject;
        $subject->save();
        return redirect("admin/subject/edit/".$id)->with('thongbao',"Sửa Thành Công");
	}
}
