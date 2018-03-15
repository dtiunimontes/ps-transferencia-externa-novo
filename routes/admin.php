<?php

// prefix: admin | as: admin.

// Rotas de autenticação do Administrador
Route::group(['namespace' => 'AuthAdmin'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login.form');
    Route::post('login', 'LoginController@login')->name('login.submit');
    Route::get('logout', 'LoginController@logout')->name('logout.submit');
});

// Rotas do Administrador - Requer autenticação
Route::group([
    'namespace' => 'Admin',
    'middleware' => 'auth:admin'
    ], function () {

    Route::get('/', 'HomeController@index')->name('home');
});