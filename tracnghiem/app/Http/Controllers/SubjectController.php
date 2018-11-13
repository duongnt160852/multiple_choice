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

class SubjectController extends Controller
{
    //
    public function __construct(){
		$this->middleware('auth:admin');
	}

	public function list(){
		$subject=Subject::where("status",1)->paginate(10);
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.subject.list",['subject'=>$subject]);
		else return view("admin.subject.list",['subject'=>$subject]);
	}

    public function getAdd(){
		if (Auth::guard('admin')->user()->status=='1') return view("sadmin.subject.add");
		else return view("admin.subject.add");
	}

	public function postAdd(Request $request){
		$validator=Validator::make($request->all(), 
			[
				"name"=>"unique:subjects,name"
			], 
			[
				"name.unique"=>"Môn thi đã tồn tại"
			]);
		if ($validator->fails()) {
			if (Auth::guard('admin')->user()->status=='1') return redirect('sadmin/subject/add')->withErrors($validator);
			else return redirect('admin/subject/add')->withErrors($validator);
		}
		$subject= new Subject;
		$subject->name=$request->name;
		$subject->save();
		if (Auth::guard('admin')->user()->status=='1') return redirect('sadmin/subject/add')->with('thongbao',"Thêm thành công");
		else return redirect('admin/subject/add')->with('thongbao',"Thêm thành công");
	}

	public function getEdit($id){
		$subject=Subject::find($id);
		if (Auth::guard('admin')->user()->status=='1') return view('sadmin.subject.edit',['subject'=>$subject]);
		else return view('admin.subject.edit',['subject'=>$subject]);
	}

	public function postEdit(Request $request,$id){
		$subject=Subject::find($id);
        $subject->name=$request->subject;
        $subject->save();
        if (Auth::guard('admin')->user()->status=='1') return redirect("sadmin/subject/edit/".$id)->with('thongbao',"Sửa Thành Công");
        else return redirect("admin/subject/edit/".$id)->with('thongbao',"Sửa Thành Công");
	}

	public function delete($id)
	{
		$subject=Subject::find($id);
		$topic=Topic::where("idSubject",$id)->get();
		foreach($topic as $value){
			$exam=Exam::where("idTopic",$value->id)->get();
			foreach ($exam as $value) {
				$value->status=0;
				$value->save();
			}
			$question=Question::where("idTopic",$id)->get();
			foreach ($question as $value) {
				$value->status=0;
				$value->save();
			}
			$value->status=0;
			$value->save();
		}		
		$subject->status=0;
		$subject->save();
    	if (Auth::guard('admin')->user()->status=='1') return redirect("sadmin/subject/list")->with("thongbao","Xóa thành công");
    	else return redirect("sadmin/subject/list")->with("thongbao","Xóa thành công");
	}
}
