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


Route::middleware('auth')->group(function () {
    Route::resource('/attendance_reports', 'AttendanceReportController')->only(['index', 'create', 'destroy', 'store']);
    Route::put('/attendance_reports/{id}/approve', ['as' => 'attendance_approve', 'uses' => 'AttendanceReportController@approve']);
    Route::put('/attendance_reports/{id}/reject', ['as' => 'attendance_reject', 'uses' => 'AttendanceReportController@reject']);
    Route::post('/attendance_reports/clock_in', ['as' => 'clock_in', 'uses' => 'AttendanceReportController@clockIn']);
    Route::post('/attendance_reports/clock_out', ['as' => 'clock_out', 'uses' => 'AttendanceReportController@clockOut']);
    
    Route::resource('/customers', 'CustomerController');
    
    Route::resource('/departments', 'DepartmentController');

    Route::resource('/divisions', 'DivisionController');

    Route::resource('/paid_leaves', 'PaidLeaveController', ['except' => ['update', 'edit']]);
    Route::put('/paid_leaves/{id}/paid_leave_approve_by_manager', ['as' => 'paid_leave_approve_by_manager', 'uses' => 'PaidLeaveController@paid_leave_approve_by_manager']);
    Route::put('/paid_leaves/{id}/paid_leave_reject_by_manager', ['as' => 'paid_leave_reject_by_manager', 'uses' => 'PaidLeaveController@paid_leave_reject_by_manager']);
    
    Route::resource('/projects', 'ProjectController');
    Route::get('/projects/{id}/assign-manager', 'ProjectController@assignManager');
    Route::get('/projects/{id}/assign-member', 'ProjectController@assignMember');
    Route::put('/projects/{id}/store-assign-manager', 'ProjectController@storeAssignManager');
    Route::put('/projects/{id}/store-assign-member', 'ProjectController@storeAssignMember');
    
    Route::resource('/request_employees', 'RequestEmployeeController')->only(['index', 'create', 'destroy', 'store']);
    Route::put('/request_employees/{id}/approve_by_manager', ['as' => 'request_approve_by_manager', 'uses' => 'RequestEmployeeController@approve_by_manager']);
    Route::put('/request_employees/{id}/reject_by_manager', ['as' => 'request_reject_by_manager', 'uses' => 'RequestEmployeeController@reject_by_manager']);
    Route::put('/request_employees/{id}/approve_by_employee', ['as' => 'request_approve_by_employee', 'uses' => 'RequestEmployeeController@approve_by_employee']);
    Route::put('/request_employees/{id}/reject_by_employee', ['as' => 'request_reject_by_employee', 'uses' => 'RequestEmployeeController@reject_by_employee']);
    
    
    Route::resource('/users', 'UserController');
    Route::get('/users/{create', 'UserController@create');
    Route::post('/users/store', ['as' => 'store_user', 'uses' => 'UserController@store']);
    Route::get('/users/{id}/add-skill', 'UserController@addSkill');
    Route::post('/users/{id}/store-skill', 'UserController@storeSkill');
    Route::delete('/users/{id}/delete-skill', ['as' => 'delete_skill', 'uses' => 'UserController@deleteSkill']);
    Route::put('/users/{id}/store_change_role', ['as' => 'store_change_role', 'uses' => 'UserController@storeChangeRole']);
    
    
    
    
    
    
});