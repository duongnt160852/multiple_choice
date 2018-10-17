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
    return view('welcome');
});

Route::get("themadmin","LoginController@themadmin");

Route::get("admin/login","LoginController@getLogin")->name('login');

Route::post("admin/login","LoginController@postLogin");

Route::get("admin/logout","LoginController@logout")->name('logout');

Route::group(["prefix"=>"admin" ,"middleware"=>"auth:admin"],function(){
	Route::get("trangchu","AdminController@trangchu")->name("trangchu");

	Route::get("quanlycauhoi","AdminController@quanlycauhoi");

	Route::get("quanlythisinh","AdminController@quanlythisinh");

	Route::get("taikhoan","AdminController@taikhoan");

	Route::get("themcauhoi","AdminController@getthemcauhoi");

	Route::post("themcauhoi","AdminController@postthemcauhoi");

	Route::get("thongbao","AdminController@thongbao");

	Route::get("themthisinh","AdminController@themthisinh");

	Route::post("themthisinh","AdminController@postthemthisinh")->name('themthisinh');

	Route::get("themmonthi","AdminController@getthemmonthi");

	Route::post("themmonthi","AdminController@postthemmonthi");

	Route::get("themchude","AdminController@getthemchude");

	Route::post("themchude","AdminController@postthemchude");

	

	Route::get("test",function(){
		return view('test');
	})->name('test');

	Route::get("ajax/getdate","AdminController@getdate");

	Route::get("ajax/gettopic","AdminController@gettopic");
});
