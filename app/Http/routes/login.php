<?php


Route::group(['prefix'=>'/','namespace'=>'Login'],function(){
    //会员入口
    Route::get('/','LoginController@index');
    Route::get('/login','LoginController@index');
    Route::resource('/','LoginController');
    Route::post('/dologin','LoginController@login');
    Route::post('/hasUser','LoginController@hasUser');
});