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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/services/all', 'ServiceController@list')->name('all_services');
Route::get('/services/add', 'ServiceController@add')->name('add_service');
Route::post('/services/add', 'ServiceController@postService')->name('post_service');

Route::get('/files/all', 'FileController@list')->name('all_files');
Route::get('/files/add', 'FileController@add')->name('add_file');
Route::post('/files/add', 'FileController@postService')->name('post_file');
