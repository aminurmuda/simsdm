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

// Route::prefix('projects')->group(function () {
//     Route::get('/', 'ProjectController@index');
//     Route::post('/', 'ProjectController@store');
//     Route::get('/create', 'ProjectController@create');
//     Route::get('/{project}', 'ProjectController@show');
//     Route::put('/{project}', 'ProjectController@update');
//     Route::delete('/{project}', 'ProjectController@destroy');
//     Route::get('/{project}/edit', 'ProjectController@edit')->name('edit');
// });

Route::middleware('auth')->group(function () {
    Route::resource('/users', 'UserController');
    Route::resource('/projects', 'ProjectController');
    Route::get('/projects/{id}/assign-manager', 'ProjectController@assignManager');
    Route::put('/projects/{id}/store-assign-manager', 'ProjectController@storeAssignManager');
    Route::resource('/divisions', 'DivisionController');
    Route::resource('/departments', 'DepartmentController');
});