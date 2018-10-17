<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Question;
use App\User;
use App\Topic;
use App\Subject;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}

	public function trangchu(){
		return view("admin.admin.trangchu");
	}

	public function quanlycauhoi(){
		$question= Question::all();
		return view("admin.admin.quanlycauhoi",["question"=>$question]);
	}

	public function quanlythisinh(){
		$user = User::orderBy("id","desc")->get();
		return view("admin.admin.quanlythisinh",["user"=>$user]);
	}

	public function taikhoan(){
		return view("admin.admin.taikhoan");
	}

	public function getthemcauhoi(){
		$subject= Subject::all();
		return view("admin.admin.themcauhoi",["subject"=>$subject]);
	}

	public function postthemcauhoi(Request $request){
		$validator=Validator::make($request->all(), 
			[
				"name"=>"unique:questions,name"
			], 
			[
				"name.unique"=>"Câu hỏi đã tồn tại"
			]);
		if ($validator->fails()) return redirect('admin/themcauhoi')->withErrors($validator);
		$question= new Question;
		$question->name=$request->question;
		$question->A=$request->A;
		$question->B=$request->B;
		$question->C=$request->C;
		$question->D=$request->D;
		$question->answer=$request->answer;
		$question->IDtopic=$request->topic;
		$question->level=$request->level;
		$question->comment=$request->comment;
		$question->save();
		return redirect('admin/themcauhoi')->with('thongbao','Thêm thành công');
	}

	public function thongbao(){
		return view("admin.admin.thongbao");
	}

	public function themthisinh(){
		return view("admin.admin.themthisinh");
	}

	public function postthemthisinh(Request $request){
		$validator=Validator::make($request->all(), 
			[
				"name"=>"required",
				"username"=>"required|unique:users,username",
				"date"=>"required",
				"month"=>"required",
				"year"=>"required"
			], 
			[
				"name.required"=>"Bạn chưa nhập tên thí sinh",
				"username.required"=>"Bạn chưa nhập MSDT",
				 "username.unique"=>"MSDT đã tồn tại",
				"date.required"=>"Bạn chưa nhập ngày",
				"month.required"=>"Bạn chưa nhập tháng",
				"year.required"=>"Bạn chưa nhập năm"
			]);
		if ($validator->fails()) return redirect('admin/themthisinh')->withErrors($validator);
		$user= new User;
		$user->name=$request->name;
		$user->username=$request->username;
		$user->password= bcrypt($request->password);
		$user->DoB=$request->year . $request->month . $request->date;
		$user->save();
		return redirect('admin/themthisinh')->with('thongbao','Thêm thành công');
	}

	public function getthemmonthi(){
		return view("admin.admin.themmonthi");
	}

	public function postthemmonthi(Request $request){
		$validator=Validator::make($request->all(), 
			[
				"name"=>"unique:subjects,name"
			], 
			[
				"name.unique"=>"Môn thi đã tồn tại"
			]);
		if ($validator->fails()) return redirect('admin/themmonthi')->withErrors($validator);
		$subject= new Subject;
		$subject->name=$request->name;
		$subject->save();
		return redirect('admin/themmonthi')->with('thongbao',"Thêm thành công");
	}

	public function getthemchude(){
		$subject= Subject::all();
		return view("admin.admin.themchude",["subject"=>$subject]);
	}

	public function postthemchude(Request $request){
		$validator=Validator::make($request->all(), 
			[
				"name"=>"unique:topics,name"
			], 
			[
				"name.unique"=>"Chủ đề đã tồn tại"
			]);
		if ($validator->fails()) return redirect('admin/themchude')->withErrors($validator);
		$topic= new Topic;
		$topic->name=$request->topic;
		$topic->IDsubject=$request->subject;
		$topic->save();
		return redirect('admin/themchude')->with('thongbao',"Thêm thành công");
	}

    public function themadmin(){
    	$admin= new Admin;
    	$admin->ID=1;
    	$admin->username="123";
    	$admin->password=bcrypt("123");
    	$admin->name="123";
    	$admin->save();
    }

    public function getdate(){
		$month=$_REQUEST["str"];
		if($month=="01"||$month=="03"||$month=="05"||$month=="07"||$month=="08"||$month=="10"||$month=="12"){
		echo "	<option value='01'>1</option>
             	<option value='02'>2</option>
                <option value='03'>3</option>
                <option value='04'>4</option>
                <option value='05'>5</option>
                <option value='06'>6</option>
                <option value='07'>7</option>
                <option value='08'>8</option>
                <option value='09'>9</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
                <option value='12'>12</option>
                <option value='13'>13</option>
                <option value='14'>14</option>
                <option value='15'>15</option>
                <option value='16'>16</option>
                <option value='17'>17</option>
                <option value='18'>18</option>
                <option value='19'>19</option>
                <option value='20'>20</option>
                <option value='21'>21</option>
                <option value='22'>22</option>
                <option value='23'>23</option>
                <option value='24'>24</option>
                <option value='25'>25</option>
                <option value='26'>26</option>
                <option value='27'>27</option>
                <option value='28'>28</option>
                <option value='29'>29</option>
                <option value='30'>30</option>
                <option value='31'>31</option>"	;
		} else if($month=="04"||$month=="06"||$month=="09"||$month=="11"){
		echo "	<option value='01'>1</option>
             	<option value='02'>2</option>
                <option value='03'>3</option>
                <option value='04'>4</option>
                <option value='05'>5</option>
                <option value='06'>6</option>
                <option value='07'>7</option>
                <option value='08'>8</option>
                <option value='09'>9</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
                <option value='12'>12</option>
                <option value='13'>13</option>
                <option value='14'>14</option>
                <option value='15'>15</option>
                <option value='16'>16</option>
                <option value='17'>17</option>
                <option value='18'>18</option>
                <option value='19'>19</option>
                <option value='20'>20</option>
                <option value='21'>21</option>
                <option value='22'>22</option>
                <option value='23'>23</option>
                <option value='24'>24</option>
                <option value='25'>25</option>
                <option value='26'>26</option>
                <option value='27'>27</option>
                <option value='28'>28</option>
                <option value='29'>29</option>
                <option value='30'>30</option>";
		}
		else if(((int)$_REQUEST["str1"]) % 4==0 && ((int)$_REQUEST["str1"]) % 100!=0) 
			echo "	<option value='01'>1</option>
             	<option value='02'>2</option>
                <option value='03'>3</option>
                <option value='04'>4</option>
                <option value='05'>5</option>
                <option value='06'>6</option>
                <option value='07'>7</option>
                <option value='08'>8</option>
                <option value='09'>9</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
                <option value='12'>12</option>
                <option value='13'>13</option>
                <option value='14'>14</option>
                <option value='15'>15</option>
                <option value='16'>16</option>
                <option value='17'>17</option>
                <option value='18'>18</option>
                <option value='19'>19</option>
                <option value='20'>20</option>
                <option value='21'>21</option>
                <option value='22'>22</option>
                <option value='23'>23</option>
                <option value='24'>24</option>
                <option value='25'>25</option>
                <option value='26'>26</option>
                <option value='27'>27</option>
                <option value='28'>28</option>
                <option value='29'>29</option>";
        else echo "	<option value='01'>1</option>
             	<option value='02'>2</option>
                <option value='03'>3</option>
                <option value='04'>4</option>
                <option value='05'>5</option>
                <option value='06'>6</option>
                <option value='07'>7</option>
                <option value='08'>8</option>
                <option value='09'>9</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
                <option value='12'>12</option>
                <option value='13'>13</option>
                <option value='14'>14</option>
                <option value='15'>15</option>
                <option value='16'>16</option>
                <option value='17'>17</option>
                <option value='18'>18</option>
                <option value='19'>19</option>
                <option value='20'>20</option>
                <option value='21'>21</option>
                <option value='22'>22</option>
                <option value='23'>23</option>
                <option value='24'>24</option>
                <option value='25'>25</option>
                <option value='26'>26</option>
                <option value='27'>27</option>
                <option value='28'>28</option>";
	}

	public function gettopic(){
		$idSubject=($_REQUEST["str"]);
		$topic= Topic::where("IDsubject",$idSubject)->get();
		foreach ($topic as $tp) {
			echo "<option value='".$tp->ID."'>".$tp->name."</option>";
		} 
	}
}
