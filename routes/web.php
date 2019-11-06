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


// Route::prefix('/users')->group(function () {
//     Route::get('/', 'UserController@index');
//     Route::get('/create', 'UserController@create');
//     Route::get('/{id}', 'UserController@show');
//     Route::get('/{id}/edit', 'UserController@edit');
//     Route::get('/users', 'UserController@index');
//     Route::get('/users', 'UserController@index');
// });

Route::resource('/users', 'UserController');

Route::resource('/projects', 'ProjectController');

// Route::prefix('projects')->group(function () {
//     Route::get('/', 'ProjectController@index');
//     Route::post('/', 'ProjectController@store');
//     Route::get('/create', 'ProjectController@create');
//     Route::get('/{project}', 'ProjectController@show');
//     Route::put('/{project}', 'ProjectController@update');
//     Route::delete('/{project}', 'ProjectController@destroy');
//     Route::get('/{project}/edit', 'ProjectController@edit')->name('edit');
// });