<?php

//登录
Route::group(['prefix' => 'lhadmin','namespace'=>'Admin'], function(){
    Route::get('login', 'LoginController@login');
    Route::post('login', 'LoginController@doLogin');
    Route::get('logout', 'LoginController@dologout');
});


//后台页面
Route::group(['prefix'=>'lhadmin','middleware'=>'AdminAuth','namespace'=>'Admin'],function(){
//Route::group(['prefix'=>'lhadmin','namespace'=>'Admin'],function(){
    //首页
    Route::get('/','HomeController@index');
    Route::resource('home','HomeController');
    //管理员
    Route::get('{genre}/admin','AdminController@index');
    Route::get('admin/setting','AdminController@setting');
    Route::post('admin/setting/{id}','AdminController@updateSetting');
    Route::get('admin/pwd','AdminController@pwd');
    Route::get('admin/setPwd/{pwd1}/{pwd2}','AdminController@setPwd');
    Route::post('admin/{id}','AdminController@update');
    Route::resource('admin','AdminController');
    //用户
    Route::get('{genre}/user','UserController@index');
    Route::resource('user','UserController');
    //用户身份
    Route::get('{uname}/identity','IdentityController@index');
    Route::get('{uid}/identity/create','IdentityController@create');
    Route::get('{uid}/identity/{id}/edit','IdentityController@edit');
    Route::post('identity/{id}','IdentityController@update');
    Route::resource('identity','IdentityController');
    //用户日志
    Route::resource('adminlog','AdminLogController');
    Route::resource('userlog','UserLogController');
    //马甲格式
    Route::post('farmvest/{id}','FarmVestController@update');
    Route::resource('farmvest','FarmVestController');
    //自定义单子
    Route::get('farm/index/{uname}','FarmController@index');
    Route::resource('farm','FarmController');
});