<?php

//会员入口
Route::group(['prefix'=>'/','namespace'=>'Login'],function(){
    Route::get('/','LoginController@login');
    Route::get('login','LoginController@login');
//    Route::resource('/','LoginController');
    Route::post('login','LoginController@dologin');
    Route::post('hasUser','LoginController@hasUser');
    Route::get('logout','LoginController@dologout');
});


Route::group(['prefix'=>'member','middleware'=>'MemberAuth','namespace'=>'Member'],function(){
    Route::resource('/','HomeController');
    Route::get('farm/index/{genre}/{status}','FarmController@index');
    Route::post('farm/{id}','FarmController@update');
    Route::get('farm/{id}/destroy','FarmController@destroy');
    Route::resource('farm','FarmController');
});