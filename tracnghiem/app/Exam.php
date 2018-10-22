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

    public function question(){
    	return $this->hasMany("App\Question","id","idQuestion");
    }
}
