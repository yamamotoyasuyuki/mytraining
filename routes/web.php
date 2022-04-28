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
    //  Route::get('', 'HomeController@index')->name('home');
     Route::get('', 'User\TrainingController@home')->name('home');
     Route::get('main', 'User\TrainingController@summary')->name('summary');
     Route::post('post', 'User\TrainingController@post');
     Route::post('bodypartpost', 'User\TrainingController@bodypartpost');
     Route::post('postcategorypost', 'User\TrainingController@postcategorypost');
     Route::get('main/achievement', 'User\TrainingController@show')->name('achievement');
     Route::get('main/delete', 'User\TrainingController@delete');
     Route::post('main/bodypartdelete', 'User\TrainingController@bodypartdelete');
     Route::post('main/postcategorydelete', 'User\TrainingController@postcategorydelete');
     Route::get('main/edit', 'User\TrainingController@edit')->name('edit');
     Route::post('main/edit', 'User\TrainingController@update');
     Route::get('main/config', 'User\TrainingController@config')->name('config');
});
