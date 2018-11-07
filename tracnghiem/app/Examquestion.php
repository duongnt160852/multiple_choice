<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examquestion extends Model
{
    protected $table="examquestion";
    public $timestamps=false;

    public function question(){
    	return $this->hasOne("App\Question","id","idQuestion");
    }
}
