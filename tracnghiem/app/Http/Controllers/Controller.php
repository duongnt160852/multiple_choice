<?php

namespace App\Http\Controllers;
use App\User;
use App\Exam;
use App\Examquestion;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getView(){
        $user=Auth::user();
        $exam=Exam::where([["id",$user->idExam],["code",$user->code]])->get()->first();
        $examquestion=Examquestion::where([["idExam",$user->idExam],["code",$user->code]])->orderBy("id")->get();
        return view("user/view",["user"=>$user,"exam"=>$exam,"examquestion"=>$examquestion]);
    }

    public function postView(Request $request, $idExam, $code){
        $count=0;
        $user=Auth::user();
        $exam=Exam::where([["id",$user->idExam],["code",$user->code]])->get()->first();
        $examquestion=Examquestion::where([["idExam",$user->idExam],["code",$user->code]])->orderBy("id")->get();
        $total=count($examquestion);
        for ($i = 1; $i <= $total ; $i++) {
            if($request->$i ==$examquestion[$i-1]->question->answer ) $count++;
        }
        $answer="";
        for ($i = 1; $i <= $total ; $i++) {
            $answer.= ($request->$i==null)?"0":$request->$i;
        }
        $dt = date('Y-m-d H:i:s');
        $user=User::find(Auth::user()->id);
        $user->status="2";
        $user->time=$dt;
        $user->count_true=$count;
        $user->total=$total;
        $user->mark=$count*10.0/$total;
        $user->save();
        return redirect()->route('result',[$count,$total,$answer]);
    }

    public function getResult($count,$total,$answer){
        $user=Auth::user();
        $exam=Exam::where([["id",$user->idExam],["code",$user->code]])->get()->first();
        $examquestion=Examquestion::where([["idExam",$user->idExam],["code",$user->code]])->orderBy("id")->get();
        return view("user.result",["count"=>$count,"exam"=>$exam,"total"=>$total,"user"=>$user,"answer"=>$answer,"examquestion"=>$examquestion]);
    }

    public function postResult($count,$total,$answer){
        return redirect()->route('answer',[$answer]);
    }

    public function answer($answer){
        $user=Auth::user();
        $exam=Exam::where([["id",$user->idExam],["code",$user->code]])->get()->first();
        $examquestion=Examquestion::where([["idExam",$user->idExam],["code",$user->code]])->orderBy("id")->get();
        return view("user/answer",["exam"=>$exam,"user"=>$user,"answer"=>$answer,"examquestion"=>$examquestion]);
    }

    public function aaa(){
        $user=Auth::user();
        $user->status="2";
        $user->save();
    }
}
