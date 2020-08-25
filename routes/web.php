<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::any('admin/login', 'Admin\LoginController@login');
Route::get('admin/code', 'Admin\LoginController@code');

Route::group(['middleware'=>['web','admin.login'], 'prefix'=>'admin', 'namespace'=>'Admin'], function() {
    // Route::get('/', function () {
    //     return view('welcome');
    // });
    // Route::get('admin/test', function () {
    //     return view('admin.test');
    // });


    Route::get('index', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::any('pass', 'IndexController@pass');
    Route::get('quit', 'LoginController@quit');
});
