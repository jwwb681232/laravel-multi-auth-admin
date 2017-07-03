<?php

Route::group(['middleware' => ['auth:admin']], function ($router) {
    $router->get('/', ['uses' => 'AdminController@index','as' => 'admin.index']);

    $router->resource('index', 'IndexController');

    //目录
    $router->resource('menus', 'MenuController');

    //后台用户
    $router->get('adminuser/ajaxIndex',['uses'=>'AdminUserController@ajaxIndex','as'=>'admin.adminuser.ajaxIndex']);
    $router->resource('adminuser', 'AdminUserController');

    //权限管理
    $router->get('permission/ajaxIndex',['uses'=>'PermissionController@ajaxIndex','as'=>'admin.permission.ajaxIndex']);
    $router->resource('permission', 'PermissionController');

    //角色管理
    $router->get('role/ajaxIndex',['uses'=>'RoleController@ajaxIndex','as'=>'admin.role.ajaxIndex']);
    $router->resource('role', 'RoleController');
});

Route::get('login', ['uses' => 'AuthController@index','as' => 'admin.auth.index']);
Route::post('login', ['uses' => 'AuthController@login','as' => 'admin.auth.login']);

Route::get('logout', ['uses' => 'AuthController@logout','as' => 'admin.auth.logout']);

Route::get('register', ['uses' => 'AuthController@getRegister','as' => 'admin.auth.register']);
Route::post('register', ['uses' => 'AuthController@postRegister','as' => 'admin.auth.register']);

Route::get('password/reset/{token?}', ['uses' => 'PasswordController@showResetForm','as' => 'admin.password.reset']);
Route::post('password/reset', ['uses' => 'PasswordController@reset','as' => 'admin.password.reset']);
Route::post('password/email', ['uses' => 'PasswordController@sendResetLinkEmail','as' => 'admin.password.email']);
