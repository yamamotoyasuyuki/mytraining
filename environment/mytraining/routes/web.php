<?php

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

Route::get('/', function () {
    return view('user/top/index');
});
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
     Route::group(['prefix' => 'home', 'middleware' => 'auth'], function() {
     Route::get('', 'HomeController@index')->name('home');
     Route::post('main', 'User\TrainingController@create');
     Route::post('post', 'User\TrainingController@post');
     Route::get('main', 'User\TrainingController@summary');
});