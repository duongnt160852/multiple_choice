<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class test extends Controller
{
    public function postImport(){
    	Excel::load(Input::file('file'),function($reader){
    		$reader->each(function($sheet){
    			foreach ($sheet->toArray() as $row) {
    				User::firstOrCreate($sheet->toArray());
    			}
    		});
    	});
    }
}
