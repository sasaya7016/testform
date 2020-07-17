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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PostController@index');

Route::group(['prefix' => 'posts'], function(){
  Route::get('index', 'PostController@index')->name('posts.index');
  Route::post('store', 'PostController@store')->name('posts.store');
  Route::post('destroy/{id}', 'PostController@destroy')->name('posts.destroy');
});