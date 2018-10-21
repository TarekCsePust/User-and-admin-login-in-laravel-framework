<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::group(['middleware'=>['auth']],function(){

	/*Route::get('/home',function()
		{
	       return view('home');		
		})->name('home');*/


	
    Route::get('/home','LoginController@userlogin')->name('home');
     Route::get('/admin','LoginController@adminlogin')->name('admin');

	/*Route::get('/admin',function()
		{
	       return view('admin');		
		})->name('admin');*/
	
});

Route::post('/login/custom',['uses'=>'LoginController@login','as'=>'login.custom']);

Auth::routes();





