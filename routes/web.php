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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employee', function () {
    return view('employee');
});

Route::get('/employee', 'App\Http\Controllers\EmployeeController@index');
Route::get('/employee/index', 'App\Http\Controllers\EmployeeController@index');
Route::get('/employee/list', 'App\Http\Controllers\EmployeeController@index');
Route::get('/employee/form', 'App\Http\Controllers\EmployeeController@index');
Route::get('/employee/edit/{num}', 'App\Http\Controllers\EmployeeController@index');

Route::get('/packages', 'App\Http\Controllers\PackagesController@index');
Route::get('/packages/index', 'App\Http\Controllers\PackagesController@index');
Route::get('/packages/list', 'App\Http\Controllers\PackagesController@index');
Route::get('/packages/form', 'App\Http\Controllers\PackagesController@index');
Route::get('/packages/edit/{num}', 'App\Http\Controllers\PackagesController@index');
