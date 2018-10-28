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

class QuestionController extends Controller
{
    //
    public function __construct(){
		$this->middleware('auth:admin');
	}
    public function list(){
		$question= Question::where("status",1)->paginate(10);
		return view("admin.question.list",["question"=>$question]);
	}

	public function getAdd(){
		$subject= Subject::orderBy("id")->get();
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
		if ($validator->fails()) return redirect('admin/question/add')->withErrors($validator);
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
		return redirect('admin/question/add')->with('thongbao','Thêm thành công');
	}

	public function getEdit($id){
        $question=Question::find($id);
		return view("admin.question.edit",['question'=>$question]);
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
        return redirect("admin/question/edit/".$id)->with('thongbao',"Sửa Thành Công");
    }

    public function postDelete($id){
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
    	return redirect("admin/question/list")->with("thongbao","Xóa thành công");
    }
}
