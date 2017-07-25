<?php

Route::group(['middleware' => ['auth:users']], function ($router) {
    $router->get('/', [
        'uses' => 'UserController@index',
        'as' => 'users.index',
    ]);
});

Route::get('login', ['uses' => 'AuthController@index', 'as' => 'users.auth.index',]);

Route::post('login', ['uses' => 'AuthController@login', 'as' => 'users.auth.login',]);

Route::get('logout', ['uses' => 'AuthController@logout', 'as' => 'users.auth.logout',]);

Route::get('register', ['uses' => 'AuthController@getRegister', 'as' => 'users.auth.register',]);

Route::post('register', ['uses' => 'AuthController@postRegister', 'as' => 'users.auth.register',]);

Route::get('password/reset/{token?}', ['uses' => 'PasswordController@showResetForm', 'as' => 'users.password.reset',]);

Route::post('password/reset', ['uses' => 'PasswordController@reset', 'as' => 'users.password.reset',]);

Route::post('password/email', ['uses' => 'PasswordController@sendResetLinkEmail', 'as' => 'users.password.email',]);
