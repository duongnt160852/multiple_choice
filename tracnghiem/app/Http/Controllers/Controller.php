<?php

namespace App\Http\Controllers;
use App\User;
use App\Exam;
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
       	$exam=Exam::where([["id",$user->idExam],["code",$user->code]])->orderBy("idOrder")->get();
    	return view("user/view",["user"=>$user,"exam"=>$exam]);
    }

    public function postView(Request $request, $idExam, $code){
    	$count=0;
    	$exam=Exam::where([["id",$idExam],["code",$code]])->orderBy("idOrder")->get();
    	$total=count($exam);
    	for ($i = 1; $i <= $total ; $i++) {
    		if($request->$i ==$exam[$i-1]->question[0]->answer ) $count++;
    	}
    	$answer="";
    	for ($i = 1; $i <= $total ; $i++) {
    		$answer.= ($request->$i==null)?"0":$request->$i;
    	}
    	return redirect()->route('result',[$count,$total,$answer]);
    }

    public function getResult($count,$total,$answer){
    	$user=Auth::user();
    	$exam=$exam=Exam::where([["id",$user->idExam],["code",$user->code]])->orderBy("idOrder")->get();
    	return view("user.result",["count"=>$count,"exam"=>$exam,"total"=>$total,"user"=>$user,"answer"=>$answer]);
    }

    public function postResult($count,$total,$answer){
    	return redirect()->route('answer',[$answer]);
    }

    public function answer($answer){
    	$user=Auth::user();
    	$exam=$exam=$exam=Exam::where([["id",$user->idExam],["code",$user->code]])->orderBy("idOrder")->get();
    	return view("user/answer",["exam"=>$exam,"user"=>$user,"answer"=>$answer]);
    }
}
