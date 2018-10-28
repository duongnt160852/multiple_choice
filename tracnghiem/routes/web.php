<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user/login');
});

Route::get("themadmin","LoginController@themadmin");

Route::get("admin/login","LoginController@getLoginAdmin")->name('login');

Route::post("admin/login","LoginController@postLoginAdmin");

Route::get("login","LoginController@getLoginUser");

Route::post("login","LoginController@postLoginUser");



Route::group(["prefix"=>"admin" ,"middleware"=>"auth:admin"],function(){
	Route::group(["prefix"=>"question"],function(){
		Route::get("list","QuestionController@list");
		Route::get("add","QuestionController@getAdd");
		Route::post("add","QuestionController@postAdd");
		Route::get("edit/{id}","QuestionController@getEdit");
		Route::post("edit/{id}","QuestionController@postEdit");
		Route::get("delete/{id}","QuestionController@postDelete");
	});
	Route::group(["prefix"=>"user"],function(){
		Route::get("list","UserController@list");
		Route::get("add","UserController@getAdd");
		Route::post("add","UserController@postAdd");
		Route::get("edit/{id}","UserController@getEdit");
		Route::post("edit/{id}","UserController@postEdit");
		Route::get("delete/{id}","UserController@postDelete");
	});
	Route::group(["prefix"=>"subject"],function(){
		Route::get("list","SubjectController@list");
		Route::get("add","SubjectController@getAdd");
		Route::post("add","SubjectController@postAdd");
		Route::get("edit/{id}","SubjectController@getEdit");
		Route::post("edit/{id}","SubjectController@postEdit");
		Route::get("delete/{id}","SubjectController@postDelete");
	});
	Route::group(["prefix"=>"topic"],function(){
		Route::get("add","TopicController@getAdd");
		Route::post("add","TopicController@postAdd");
		Route::get("list","TopicController@list");
		Route::get("edit/{id}","TopicController@getEdit");
		Route::post("edit/{id}","TopicController@postEdit");
		Route::get("delete/{id}","TopicController@postDelete");
	});
	Route::group(["prefix"=>"exam"],function(){
		Route::get("add","ExamController@getAdd");
		Route::post("add","ExamController@postAdd");
		Route::get('list','ExamController@list');
		Route::get('view/{id?}','ExamController@viewExam');
		Route::get("delete/{id}","ExamController@postDelete");
	});
	Route::group(["prefix"=>"ajax"],function(){
		Route::get("getdate","AjaxController@getDate");
		Route::get("gettopic","AjaxController@getTopic");
		Route::get("getexam","AjaxController@getExam");
	});
	Route::get("home","AdminController@home")->name("home");
	Route::get("/","AdminController@home");
	Route::get("taikhoan","AdminController@taikhoan");
	Route::get("thongbao","AdminController@thongbao");
	Route::get("logout","AdminController@logout")->name('logout');
});

Route::group(["prefix"=>"user","middleware"=>"auth"],function(){
	Route::get("view","Controller@getView");
	Route::post("view/{idExam}/{code}","Controller@postView");
	Route::get("result/{count?}/{total?}/{answer?}","Controller@getResult")->name("result");
	Route::post("result/{count}/{total}/{answer}","Controller@postResult");
	Route::get("answer/{answer}","Controller@answer")->name("answer");
});
	Route::get("test","TopicController@test");
	Route::get("aaa","AdminController@aaa");
