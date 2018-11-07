<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table="exams";
    public $timestamps=false;

    public function topic(){
    	return $this->belongsTo("App\Topic","idTopic","id");
    }

    public function examquestion(){
    	return $this->hasMany("App\Examquestion","idExam","id");
    }
}
