<?php

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('', 'PagesController@index');

Route::get('dashboard/download', 'QrcodeController@download');

Route::get('/dashboard/create/preview', 'QrcodeController@preview');
Route::resource('/dashboard', 'QrcodeController');

Route::get('/promotion/{id}', 'PromotionController@index');



