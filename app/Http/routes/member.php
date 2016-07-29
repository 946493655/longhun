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
    Route::resource('user','UserController');
    Route::post('identity/{id}','IdentityController@update');
    Route::resource('identity','IdentityController');
    Route::resource('contact','ContactController');
    //自定义单子
    Route::post('farm/{id}','FarmController@update');
    Route::get('farm/status/{id}','FarmController@status');
    Route::get('farm/status/{id}/{status}','FarmController@setStatus');
    Route::get('farm/{id}/destroy','FarmController@destroy');
    Route::get('farm/index/{genre}/{status}','FarmController@index');
    Route::resource('farm','FarmController');
    Route::post('farmSupply/{id}','FarmSupplyController@update');
    Route::resource('farmSupply','FarmSupplyController');
    Route::post('farmDemand/{id}','FarmDemandController@update');
    Route::resource('farmDemand','FarmDemandController');
});