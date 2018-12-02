<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Question;
use App\User;
use App\Topic;
use App\Exam;
use App\Subject;
use App\Examquestion;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth as Auth;

class ExamController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function list(){
        $exam=Exam::where("status",1)->groupBy('id')->paginate(10);
        if (Auth::guard('admin')->user()->status=='1') return view("sadmin.exam.list",["exam"=>$exam]);
        else return view("admin.exam.list",["exam"=>$exam]);
    }

    public function viewExam($id){
        $exam=Exam::where([["id","=",$id],["code","=","1"]])->get()->first();
        $examquestion=Examquestion::where([["idExam","=",$id],["code","=","1"]])->orderBy('id')->get();
        if (Auth::guard('admin')->user()->status=='1') return view("sadmin.exam.view",["exam"=>$exam,"examquestion"=>$examquestion]);
        else return view("admin.exam.view",["exam"=>$exam,"examquestion"=>$examquestion]);
    }

    public function getAdd(){
        $subject=Subject::orderBy('id')->get();
        if (Auth::guard('admin')->user()->status=='1') return view("sadmin.exam.add",["subject"=>$subject]);
        else return view("admin.exam.add",["subject"=>$subject]);
    }

    public function postAdd(Request $request){

        $exam_max_id=Exam::max('id');
        for($j=1;$j<=12;$j++){
            $exam= new Exam;
            $exam->id=$exam_max_id+1;
            $exam->code=$j;
            $exam->name=$request->name;
            $exam->time=$request->time;
            $exam->idTopic=$request->topic;
            $exam->save();
        }

        if($request->level1>0){
            $question=Question::where([["idTopic",$request->topic],["level",1],['status',1]])->inRandomOrder()->limit($request->level1)->get();
           foreach ($question as $value) {
              $array_question[]=$value;
           }
           for($j=1;$j<=12;$j++){
              shuffle($array_question);
              foreach($array_question as $a) {
              $examquestion= new Examquestion;
              $examquestion->idExam=$exam_max_id+1;
              $examquestion->code=$j;
              $examquestion->idQuestion=$a->id;
              $examquestion->save();
              }
           }
        }
        if ($request->level2 >0){
            $question=Question::where([["idTopic",$request->topic],["level",2],['status',1]])->inRandomOrder()->limit($request->level2)->get();
           $array_question=null;
           foreach ($question as $value) {
              $array_question[]=$value;
           }
           for($j=1;$j<=12;$j++){
              shuffle($array_question);
              foreach($array_question as $a) {
              $examquestion= new Examquestion;
              $examquestion->idExam=$exam_max_id+1;
              $examquestion->code=$j;
              $examquestion->idQuestion=$a->id;
              $examquestion->save();
              }
           }
        }
        if ($request->level3>0){
            $question=Question::where([["idTopic",$request->topic],["level",3],['status',1]])->inRandomOrder()->limit($request->level3)->get();
           $array_question=null;
           foreach ($question as $value) {
              $array_question[]=$value;
           }
        
           for($j=1;$j<=12;$j++){
              shuffle($array_question);
              foreach($array_question as $a) {
              $examquestion= new Examquestion;
              $examquestion->idExam=$exam_max_id+1;
              $examquestion->code=$j;
              $examquestion->idQuestion=$a->id;
              $examquestion->save();
              }
           }
        }
        if ($request->level4>0){
            $question=Question::where([["idTopic",$request->topic],["level",4],['status',1]])->inRandomOrder()->limit($request->level4)->get();
           $array_question=null;
           foreach ($question as $value) {
              $array_question[]=$value;
           }
            for($j=1;$j<=12;$j++){
                shuffle($array_question);
                foreach($array_question as $a) {
                $examquestion= new Examquestion;
                $examquestion->idExam=$exam_max_id+1;
                $examquestion->code=$j;
                $examquestion->idQuestion=$a->id;
                $examquestion->save();
                }
            }
        }
        if ($request->level5>0){
            $question=Question::where([["idTopic",$request->topic],["level",5],['status',1]])->inRandomOrder()->limit($request->level5)->get();
            $array_question=null;
            foreach ($question as $value) {
                $array_question[]=$value;
            }
            for($j=1;$j<=12;$j++){
                shuffle($array_question);
                foreach($array_question as $a) {
                $examquestion= new Examquestion;
                $examquestion->idExam=$exam_max_id+1;
                $examquestion->code=$j;
                $examquestion->idQuestion=$a->id;
                $examquestion->save();
                }
            }
            }
        if (Auth::guard('admin')->user()->status=='1') return redirect("sadmin/exam/add")->with('thongbao','Thêm thành công');
        else return redirect("admin/exam/add")->with('thongbao','Thêm thành công');
    }

    public function delete($id)
    {
        $exam=Exam::where("id",$id)->get();
        foreach ($exam as $value) {
            $value->status=0;
            $value->save();
        }
        if (Auth::guard('admin')->user()->status=='1') return redirect("sadmin/exam/list")->with("thongbao","Xóa thành công");
        else return redirect("admin/exam/list")->with("thongbao","Xóa thành công");
    }

    public function getEdit($id){
      $exam=Exam::where([['id',$id],['code',1]])->get()->first();
      if (Auth::guard('admin')->user()->status=='1') return view('sadmin/exam/edit',['exam'=>$exam]);
      return view('admin/exam/edit',['exam'=>$exam]);
    }

    public function postEdit(Request $request,$id){
      $exam= Exam::where('id',$id)->get();
      foreach ($exam as $ex) {
        $ex->name=$request->name;
        $ex->time=$request->time;
        $ex->save();
      }
      return redirect()->back()->with('thongbao',"Sửa thành công");
    }
}
