<?php


Route::group(['prefix'=>'/','namespace'=>'Login'],function(){
    //会员入口
    Route::resource('/','LoginController');
    Route::post('/login','LoginController@login');
});