<?php


Route::group(['prefix'=>'lhadmin','namespace'=>'Admin'],function(){
    //首页
    Route::get('/','HomeController@index');
    Route::resource('home','HomeController');
    //管理员
    Route::get('{genre}/admin','AdminController@index');
//    Route::get('admin/{id}/pwd','AdminController@index');
    Route::resource('admin','AdminController');
    //用户
    Route::get('{genre}/user','UserController@index');
    Route::resource('user','UserController');
    //用户身份
    Route::get('identity','IdentityController@index');
    Route::resource('{uname}/identity','IdentityController');
});