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
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/enter', 'ReportControlller@login_by_code')->name('enter');
Route::get('/manage/reports/show/{id}', 'ReportControlller@show')->name('reports.show');

Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author|contributor')->group(function() {
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
	Route::resource('users', 'UsersController');
	Route::resource('permissions', 'PermissionsController', ['except'=>'destroy']);
	Route::resource('roles', 'RolesController');
	Route::resource('employees', 'EmployeeController');
});
