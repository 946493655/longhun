<?php

//会员入口
Route::group(['prefix'=>'/','namespace'=>'Login'],function(){
    Route::get('/','LoginController@login');
    Route::get('login','LoginController@login');
//    Route::resource('/','LoginController');
    Route::post('login','LoginController@dologin');
    Route::post('hasUser','LoginController@hasUser');
});


Route::group(['prefix'=>'member','middleware'=>'MemberAuth','namespace'=>'Member'],function(){
    Route::resource('/','HomeController');
});