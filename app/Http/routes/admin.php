<?php


Route::group(['prefix'=>'lhadmin','namespace'=>'Admin'],function(){
    Route::get('/','HomeController@index');
    Route::resource('home','HomeController');
    Route::get('{genre}/admin','AdminController@index');
    Route::resource('admin','AdminController');
});