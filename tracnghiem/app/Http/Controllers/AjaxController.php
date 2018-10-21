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

class AjaxController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function getDate(){
		$month=$_REQUEST["str"];
		if($month=="01"||$month=="03"||$month=="05"||$month=="07"||$month=="08"||$month=="10"||$month=="12"){
            for($i=1;$i<=31;$i++){
                if ($i<10) echo "<option value='0" .$i. "'>".$i."</option>";
                else echo "<option value='" .$i. "'>".$i."</option>";
            }
		} else if($month=="04"||$month=="06"||$month=="09"||$month=="11"){
		for($i=1;$i<=30;$i++){
                if ($i<10) echo "<option value='0" .$i. "'>".$i."</option>";
                else echo "<option value='" .$i. "'>".$i."</option>";
            }
		}
		else if(((int)$_REQUEST["str1"]) % 4==0 && ((int)$_REQUEST["str1"]) % 100!=0) {
			for($i=1;$i<=29;$i++){
                if ($i<10) echo "<option value='0" .$i. "'>".$i."</option>";
                else echo "<option value='" .$i. "'>".$i."</option>";
            }
		}
        else {
            for($i=1;$i<=28;$i++){
                if ($i<10) echo "<option value='0" .$i. "'>".$i."</option>";
                else echo "<option value='" .$i. "'>".$i."</option>";
            }
        }
	}

	public function getTopic(){
		$idSubject=$_REQUEST["str"];
		$topic= Topic::where("idSubject",$idSubject)->get();
		foreach ($topic as $tp) {
			echo "<option value='".$tp->id."'>".$tp->name."</option>";
		} 
	}

	public function getExam(){
		$idTopic=$_REQUEST["str"];
		$exam= Exam::select('name','id')->where("idTopic",$idTopic)->distinct()->get();
		foreach ($exam as $ex) {
			echo "<option value='".$ex->id."'>".$ex->name."</option>";
		} 
	}
}
