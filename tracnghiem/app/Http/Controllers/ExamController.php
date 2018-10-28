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

class ExamController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function list(){
        $exam=Exam::where("status",1)->groupBy('id')->paginate(10);
        return view("admin.exam.list",["exam"=>$exam]);
    }

    public function viewExam($id){
        $exam=Exam::where([["id","=",$id],["code","=","1"]])->orderBy('idOrder')->get();
        return view("admin.exam.view",["exam"=>$exam]);
    }

    public function getAdd(){
    	$subject=Subject::orderBy('id')->get();
    	return view("admin.exam.add",["subject"=>$subject]);
    }

    public function postAdd(Request $request){
    	$exam_max_id=Exam::max('id');
    	
    	if($request->level1>0){
    		$question=Question::where([["idTopic",$request->topic],["level",1]])->inRandomOrder()->limit($request->level1)->get();
    	   foreach ($question as $value) {
    		  $array_question[]=$value;
    	   }
    	   for($j=1;$j<=12;$j++){
    		  shuffle($array_question);
    		  foreach($array_question as $a) {
    		  $exam= new Exam;
    		  $exam->id=$exam_max_id+1;
    		  $exam->code=$j;
    		  $exam->idQuestion=$a->id;
    		  $exam->name=$request->name;
    		  $exam->time=$request->time;
    		  $exam->idTopic=$a->idTopic;
    		  $exam->save();
    		  }
    	   }
    	}
    	if ($request->level2 >0){
    		$question=Question::where([["idTopic",$request->topic],["level",2]])->inRandomOrder()->limit($request->level2)->get();
    	   $array_question=null;
    	   foreach ($question as $value) {
    		  $array_question[]=$value;
    	   }
    	   for($j=1;$j<=12;$j++){
    		  shuffle($array_question);
    		  foreach($array_question as $a) {
    		  $exam= new Exam;
    		  $exam->id=$exam_max_id+1;
    		  $exam->code=$j;
    		  $exam->idQuestion=$a->id;
    		  $exam->name=$request->name;
    		  $exam->time=$request->time;
    		  $exam->idTopic=$a->idTopic;
    		  $exam->save();
    		  }
    	   }
    	}
    	if ($request->level3>0){
    		$question=Question::where([["idTopic",$request->topic],["level",3]])->inRandomOrder()->limit($request->level3)->get();
    	   $array_question=null;
    	   foreach ($question as $value) {
    		  $array_question[]=$value;
    	   }
    	
    	   for($j=1;$j<=12;$j++){
    		  shuffle($array_question);
    		  foreach($array_question as $a) {
    		  $exam= new Exam;
    	   	  $exam->id=$exam_max_id+1;
    	   	  $exam->code=$j;
    	   	  $exam->idQuestion=$a->id;
    	   	  $exam->name=$request->name;
    	   	  $exam->time=$request->time;
    	   	  $exam->idTopic=$a->idTopic;
    	   	  $exam->save();
    		  }
    	   }
    	}
    	if ($request->level4>0){
    		$question=Question::where([["idTopic",$request->topic],["level",4]])->inRandomOrder()->limit($request->level4)->get();
    	   $array_question=null;
    	   foreach ($question as $value) {
    		  $array_question[]=$value;
    	   }
        	for($j=1;$j<=12;$j++){
        		shuffle($array_question);
        		foreach($array_question as $a) {
        		$exam= new Exam;
        		$exam->id=$exam_max_id+1;
        		$exam->code=$j;
        		$exam->idQuestion=$a->id;
        		$exam->name=$request->name;
        		$exam->time=$request->time;
        		$exam->idTopic=$a->idTopic;
        		$exam->save();
        		}
        	}
    	}
     	if ($request->level5>0){
    		$question=Question::where([["idTopic",$request->topic],["level",5]])->inRandomOrder()->limit($request->level5)->get();
        	$array_question=null;
        	foreach ($question as $value) {
        		$array_question[]=$value;
        	}
        	for($j=1;$j<=12;$j++){
        		shuffle($array_question);
        		foreach($array_question as $a) {
        		$exam= new Exam;
        		$exam->id=$exam_max_id+1;
        		$exam->code=$j;
        		$exam->idQuestion=$a->id;
        		$exam->name=$request->name;
        		$exam->time=$request->time;
        		$exam->idTopic=$a->idTopic;
        		$exam->save();
        		}
        	}
        	}
    	return redirect("admin/exam/add")->with('thongbao','Thêm thành công');
    }

    public function postDelete($id)
    {
        $exam=Exam::where("id",$id)->get();
        foreach ($exam as $value) {
            $value->status=0;
            $value->save();
        }
        return redirect("admin/exam/list")->with("thongbao","Xóa thành công");
    }
}
