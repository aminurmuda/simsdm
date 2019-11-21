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

Route::get('/dashboard', 'HomeController@index')->name('home');

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
    Route::resource('/request_employees', 'RequestEmployeeController')->only(['index', 'create', 'destroy', 'store']);
    Route::put('/request_employees/{id}/approve', ['as' => 'request_approve', 'uses' => 'RequestEmployeeController@approve']);
    Route::put('/request_employees/{id}/reject', ['as' => 'request_reject', 'uses' => 'RequestEmployeeController@reject']);


    Route::resource('/users', 'UserController');
    Route::get('/users/{id}/add-skill', 'UserController@addSkill');
    Route::post('/users/{id}/store-skill', 'UserController@storeSkill');
    


    Route::resource('/attendance_reports', 'AttendanceReportController')->only(['index', 'create', 'destroy', 'store']);
    Route::put('/attendance_reports/{id}/approve', ['as' => 'attendance_approve', 'uses' => 'AttendanceReportController@approve']);
    Route::put('/attendance_reports/{id}/reject', ['as' => 'attendance_reject', 'uses' => 'AttendanceReportController@reject']);
    Route::post('/attendance_reports/clock_in', ['as' => 'clock_in', 'uses' => 'AttendanceReportController@clockIn']);
    Route::post('/attendance_reports/clock_out', ['as' => 'clock_out', 'uses' => 'AttendanceReportController@clockOut']);

    

    Route::resource('/customers', 'CustomerController');
    
    

    Route::resource('/projects', 'ProjectController');
    Route::get('/projects/{id}/assign-manager', 'ProjectController@assignManager');
    Route::get('/projects/{id}/assign-member', 'ProjectController@assignMember');
    Route::put('/projects/{id}/store-assign-manager', 'ProjectController@storeAssignManager');
    Route::put('/projects/{id}/store-assign-member', 'ProjectController@storeAssignMember');
    


    Route::resource('/divisions', 'DivisionController');
    


    Route::resource('/departments', 'DepartmentController');
    
});