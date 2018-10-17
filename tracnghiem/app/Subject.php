<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table="subjects";
    public $timestamps=false;
    public function topic(){
    	return $this->hasMany('Topic','IDsubject','ID');
    }
}
