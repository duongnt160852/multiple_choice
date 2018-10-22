<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table="topics";
    public $timestamps=false;

    public function subject(){
    	return $this->belongsTo('App\Subject','idSubject','id');
    }

    public function question(){
    	return $this->hasMany('App\Question','id','idQuestion');
    }
}
