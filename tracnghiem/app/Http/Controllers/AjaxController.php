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

	public function searchUser(){
		$option=$_REQUEST["str"];
		$name=$_REQUEST["str1"];
		if($option=="1"){
			$user = User::where([["name","like","%".$name."%"],["status","!=","3"]])->get();
			foreach ($user as $value) {
                if($value->status=="0")
                	echo '<tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->username.'</td>
                        <td>'.$value->email.'</td>
                        <td>'.$value->DoB.'</td>
                        <td> chưa thi
                        </td>
                        <td>'.$value->mark.'</td>
                        <td>'.$value->time.'</td>
                        <td>'.$value->exam->topic->subject->name.'</td>
                        <td>'.$value->exam->name.'</td>
                        <td>'.$value->code.'</td>
                        <td><a href="admin/user/edit/'.$value->id.'"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                        <td><a onclick="myFunction('.$value->id.')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                    </tr>' ;
                else if($value->status=="1")
                	echo '<tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->username.'</td>
                        <td>'.$value->email.'</td>
                        <td>'.$value->DoB.'</td>
                        <td> đang thi
                        </td>
                        <td>'.$value->mark.'</td>
                        <td>'.$value->time.'</td>
                        <td>'.$value->exam->topic->subject->name.'</td>
                        <td>'.$value->exam->name.'</td>
                        <td>'.$value->code.'</td>
                        <td><a href="admin/user/edit/'.$value->id.'"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                        <td><a onclick="myFunction('.$value->id.')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                    </tr>' ;
                else echo '<tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->username.'</td>
                        <td>'.$value->email.'</td>
                        <td>'.$value->DoB.'</td>
                        <td> đã thi
                        </td>
                        <td>'.$value->mark.'</td>
                        <td>'.$value->time.'</td>
                        <td>'.$value->exam->topic->subject->name.'</td>
                        <td>'.$value->exam->name.'</td>
                        <td>'.$value->code.'</td>
                        <td><a href="admin/user/edit/'.$value->id.'"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                        <td><a onclick="myFunction('.$value->id.')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                    </tr>' ;
			}
		}
		else if($option=="2"){
			$user = User::where([["email","like","%".$name."%"],["status","!=","3"]])->get();
			foreach ($user as $value) {
                if($value->status=="0")
                	echo '<tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->username.'</td>
                        <td>'.$value->email.'</td>
                        <td>'.$value->DoB.'</td>
                        <td> chưa thi
                        </td>
                        <td>'.$value->mark.'</td>
                        <td>'.$value->time.'</td>
                        <td>'.$value->exam->topic->subject->name.'</td>
                        <td>'.$value->exam->name.'</td>
                        <td>'.$value->code.'</td>
                        <td><a href="admin/user/edit/'.$value->id.'"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                        <td><a onclick="myFunction('.$value->id.')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                    </tr>' ;
                else if($value->status=="1")
                	echo '<tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->username.'</td>
                        <td>'.$value->email.'</td>
                        <td>'.$value->DoB.'</td>
                        <td> đang thi
                        </td>
                        <td>'.$value->mark.'</td>
                        <td>'.$value->time.'</td>
                        <td>'.$value->exam->topic->subject->name.'</td>
                        <td>'.$value->exam->name.'</td>
                        <td>'.$value->code.'</td>
                        <td><a href="admin/user/edit/'.$value->id.'"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                        <td><a onclick="myFunction('.$value->id.')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                    </tr>' ;
                else echo '<tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->username.'</td>
                        <td>'.$value->email.'</td>
                        <td>'.$value->DoB.'</td>
                        <td> đã thi
                        </td>
                        <td>'.$value->mark.'</td>
                        <td>'.$value->time.'</td>
                        <td>'.$value->exam->topic->subject->name.'</td>
                        <td>'.$value->exam->name.'</td>
                        <td>'.$value->code.'</td>
                        <td><a href="admin/user/edit/'.$value->id.'"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                        <td><a onclick="myFunction('.$value->id.')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                    </tr>' ;
			}
		}
		else {
			$user = User::where([["username","like","%".$name."%"],["status","!=","3"]])->get();
			foreach ($user as $value) {
                if($value->status=="0")
                	echo '<tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->username.'</td>
                        <td>'.$value->email.'</td>
                        <td>'.$value->DoB.'</td>
                        <td> chưa thi
                        </td>
                        <td>'.$value->mark.'</td>
                        <td>'.$value->time.'</td>
                        <td>'.$value->exam->topic->subject->name.'</td>
                        <td>'.$value->exam->name.'</td>
                        <td>'.$value->code.'</td>
                        <td><a href="admin/user/edit/'.$value->id.'"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                        <td><a onclick="myFunction('.$value->id.')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                    </tr>' ;
                else if($value->status=="1")
                	echo '<tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->username.'</td>
                        <td>'.$value->email.'</td>
                        <td>'.$value->DoB.'</td>
                        <td> đang thi
                        </td>
                        <td>'.$value->mark.'</td>
                        <td>'.$value->time.'</td>
                        <td>'.$value->exam->topic->subject->name.'</td>
                        <td>'.$value->exam->name.'</td>
                        <td>'.$value->code.'</td>
                        <td><a href="admin/user/edit/'.$value->id.'"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                        <td><a onclick="myFunction('.$value->id.')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                    </tr>' ;
                else echo '<tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->username.'</td>
                        <td>'.$value->email.'</td>
                        <td>'.$value->DoB.'</td>
                        <td> đã thi
                        </td>
                        <td>'.$value->mark.'</td>
                        <td>'.$value->time.'</td>
                        <td>'.$value->exam->topic->subject->name.'</td>
                        <td>'.$value->exam->name.'</td>
                        <td>'.$value->code.'</td>
                        <td><a href="admin/user/edit/'.$value->id.'"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                        <td><a onclick="myFunction('.$value->id.')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                    </tr>' ;
			}
		}
	}

	public function cancel(){
		$user = User::where("status","!=","3")->paginate(10);
		foreach ($user as $value) {
                if($value->status=="0")
                	echo '<tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->username.'</td>
                        <td>'.$value->email.'</td>
                        <td>'.$value->DoB.'</td>
                        <td> chưa thi
                        </td>
                        <td>'.$value->mark.'</td>
                        <td>'.$value->time.'</td>
                        <td>'.$value->exam->topic->subject->name.'</td>
                        <td>'.$value->exam->name.'</td>
                        <td>'.$value->code.'</td>
                        <td><a href="admin/user/edit/'.$value->id.'"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                        <td><a onclick="myFunction('.$value->id.')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                    </tr>' ;
                else if($value->status=="1")
                	echo '<tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->username.'</td>
                        <td>'.$value->email.'</td>
                        <td>'.$value->DoB.'</td>
                        <td> đang thi
                        </td>
                        <td>'.$value->mark.'</td>
                        <td>'.$value->time.'</td>
                        <td>'.$value->exam->topic->subject->name.'</td>
                        <td>'.$value->exam->name.'</td>
                        <td>'.$value->code.'</td>
                        <td><a href="admin/user/edit/'.$value->id.'"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                        <td><a onclick="myFunction('.$value->id.')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                    </tr>' ;
                else echo '<tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->username.'</td>
                        <td>'.$value->email.'</td>
                        <td>'.$value->DoB.'</td>
                        <td> đã thi
                        </td>
                        <td>'.$value->mark.'</td>
                        <td>'.$value->time.'</td>
                        <td>'.$value->exam->topic->subject->name.'</td>
                        <td>'.$value->exam->name.'</td>
                        <td>'.$value->code.'</td>
                        <td><a href="admin/user/edit/'.$value->id.'"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                        <td><a onclick="myFunction('.$value->id.')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                    </tr>' ;
		}
	}

	public function paginate(){
		$user = User::where("status","!=","3")->paginate(10);
		echo $user->links();
	}
	public function paginate1(){
		$option=$_REQUEST["str"];
		$name=$_REQUEST["str1"];
		if($option=="1"){
			$user = User::where([["name","like","%".$name."%"],["status","!=","3"]])->paginate(10);
		}
		else if ($option=="1"){
			$user = User::where([["email","like","%".$name."%"],["status","!=","3"]])->paginate(10);
		}
		else {
			$user = User::where([["username","like","%".$name."%"],["status","!=","3"]])->paginate(10);
		}
		echo $user->links();
	}
}

