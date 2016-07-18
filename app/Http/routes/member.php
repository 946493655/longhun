<?php


Route::group(['prefix'=>'/','middleware'=>'MemberAuth','namespace'=>'Member'],function(){
    //会员入口
    Route::resource('/','LoginController');
});