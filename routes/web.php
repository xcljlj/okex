<?php
Route::get('/', function () {
    return view('index');
});

Route::post('/login', 'Home\LoginController@index')->name('login');//登录
Route::post('/register', 'Home\RegisterController@signUp')->name('register');//注册