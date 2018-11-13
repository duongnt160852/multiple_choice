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

class QuestionController extends Controller
{
    //
    public function __construct(){
		$this->middleware('auth:admin');
	}
    public function list(){
		$question= Question::where("status",1)->paginate(10);
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.question.list",["question"=>$question]);
		else return view("admin.question.list",["question"=>$question]);
	}

	public function getAdd(){
		$subject= Subject::orderBy("id")->get();
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.question.add",["subject"=>$subject]);
		return view("admin.question.add",["subject"=>$subject]);
	}

	public function postAdd(Request $request){
		$validator=Validator::make($request->all(), 
			[
				"name"=>"unique:questions,name"
			], 
			[
				"name.unique"=>"Câu hỏi đã tồn tại"
			]);
		if ($validator->fails()) {
			if (Auth::guard('admin')->user()->status=='1') return redirect('sadmin/question/add')->withErrors($validator);
			else return redirect('admin/question/add')->withErrors($validator);
		}
		$question= new Question;
		$question->id=$request->id;
		$question->name=$request->question;
		$question->A=$request->A;
		$question->B=$request->B;
		$question->C=$request->C;
		$question->D=$request->D;
		$question->answer=$request->answer;
		$question->idTopic=$request->topic;
		$question->level=$request->level;
		$question->comment=$request->comment;
		$question->save();
		if (Auth::guard('admin')->user()->status=='1') return redirect('sadmin/question/add')->with('thongbao','Thêm thành công');
		else return redirect('admin/question/add')->with('thongbao','Thêm thành công');
	}

	public function getEdit($id){
        $question=Question::find($id);
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.question.edit",['question'=>$question]);
		else return view("admin.question.edit",['question'=>$question]);
	}

	public function postEdit(Request $request,$id){
        $question=Question::find($id);
        $question->name=$request->question;
        $question->A=$request->A;
        $question->B=$request->B;
        $question->C=$request->C;
        $question->D=$request->D;
        $question->answer=$request->answer;
        $question->level=$request->level;
        $question->comment=$request->comment;
        $question->save();
        if (Auth::guard('admin')->user()->status=='1') return redirect("sadmin/question/edit/".$id)->with('thongbao',"Sửa Thành Công");
        else return redirect("admin/question/edit/".$id)->with('thongbao',"Sửa Thành Công");
    }

    public function delete($id){
    	$question=Question::find($id);
    	$exam=Exam::where("idQuestion",$id)->get();
    	foreach ($exam as $value) {
    		$exam1=Exam::where("id",$value->id)->get();
    		foreach ($exam1 as $value) {
    			$value->status=0;
    			$value->save();
    		}
    	}
    	$question->status=0;
    	$question->save();
    	if (Auth::guard('admin')->user()->status=='1') return redirect("sadmin/question/list")->with("thongbao","Xóa thành công");
    	else return redirect("admin/question/list")->with("thongbao","Xóa thành công");
    }
}
