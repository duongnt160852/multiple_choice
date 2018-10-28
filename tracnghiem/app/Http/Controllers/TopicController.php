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

	public function list(){
		$topic=Topic::where("status",1)->paginate(10);
		return view('admin.topic.list',['topic'=>$topic]);
	}

	public function getEdit($id){
		$topic=Topic::find($id);
		return view('admin.topic.edit',['topic'=>$topic]);
	}

	public function postEdit(Request $request,$id){
		$topic=Topic::find($id);
        $topic->name=$request->topic;
        $topic->save();
        return redirect("admin/topic/edit/".$id)->with('thongbao',"Sửa Thành Công");
	}

	public function test(){
		$question=Question::find(31);
		return view("test",['question'=>$question]);
	}

	public function postDelete($id)
	{
		$topic=Topic::find($id);
    	$exam=Exam::where("idTopic",$id)->get();
    	foreach ($exam as $value) {
    		$value->status=0;
    		$value->save();
    	}
    	$question=Question::where("idTopic",$id);
    	foreach ($question as $value) {
    		$value->status=0;
    		$value->save();
    	}
    	$topic->status=0;
    	$topic->save();
    	return redirect("admin/topic/list")->with("thongbao","Xóa thành công");
	}
}
