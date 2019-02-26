<?php

Route::get('/', 'IndexController@index');
Route::get('/login', 'IndexController@loginShow');
Route::post('/login', 'IndexController@login');

Route::group(['prefix' => '/admin', 'middleware' => 'admin'],function () {
    Route::get('/', 'HomeController@index');
});