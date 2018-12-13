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

class TopicController extends Controller
{
    //
    public function __construct(){
		$this->middleware('auth:admin');
	}
    public function getAdd(){
		$subject= Subject::where("status","1")->orderBy("id")->get();
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.topic.add",["subject"=>$subject]);
		else return view("admin.topic.add",["subject"=>$subject]);
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
		if (Auth::guard('admin')->user()->status=='1') return redirect('sadmin/topic/add')->with('thongbao',"Thêm thành công");
		else return redirect('admin/topic/add')->with('thongbao',"Thêm thành công");
	}

	public function list(){
		$topic=Topic::where("status",1)->paginate(10);
		if (Auth::guard('admin')->user()->status=='1') return view('sadmin.topic.list',['topic'=>$topic]);
		else return view('admin.topic.list',['topic'=>$topic]);
	}

	public function getEdit($id){
		$topic=Topic::find($id);
		if (Auth::guard('admin')->user()->status=='1') return view('sadmin.topic.edit',['topic'=>$topic]);
		else return view('admin.topic.edit',['topic'=>$topic]);
	}

	public function postEdit(Request $request,$id){
		$topic=Topic::find($id);
        $topic->name=$request->topic;
        $topic->save();
        if (Auth::guard('admin')->user()->status=='1') return redirect("sadmin/topic/edit/".$id)->with('thongbao',"Sửa Thành Công");
        else return redirect("admin/topic/edit/".$id)->with('thongbao',"Sửa Thành Công");
	}

	public function delete($id)
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
    	if (Auth::guard('admin')->user()->status=='1') return redirect("sadmin/topic/list")->with("thongbao","Xóa thành công");
    	else return redirect("admin/topic/list")->with("thongbao","Xóa thành công");
	}
}
