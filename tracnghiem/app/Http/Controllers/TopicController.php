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

class TopicController extends Controller
{
    //
    public function __construct(){
		$this->middleware('auth:admin');
	}
    public function getAdd(){
		$subject= Subject::orderBy("id")->get();
		return view("admin.topic.add",["subject"=>$subject]);
	}

	public function postAdd(Request $request){
		$validator=Validator::make($request->all(), 
			[
				"name"=>"unique:topics,name"
			], 
			[
				"name.unique"=>"Chủ đề đã tồn tại"
			]);
		if ($validator->fails()) return redirect('admin/topic/add')->withErrors($validator);
		$topic= new Topic;
		$topic->name=$request->topic;
		$topic->idSubject=$request->subject;
		$topic->save();
		return redirect('admin/topic/add')->with('thongbao',"Thêm thành công");
	}

	public function test(){
		$question=Question::find(29);
		return view("test",['question'=>$question]);
	}
}
