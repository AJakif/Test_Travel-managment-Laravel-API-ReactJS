<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employee/role', 'App\Http\Controllers\API\EmployeeController@list_role');

Route::post('/employee/create', 'App\Http\Controllers\API\EmployeeController@create');
Route::get('/employee/list', 'App\Http\Controllers\API\EmployeeController@list');
Route::get('/employee/get/{id}', 'App\Http\Controllers\API\EmployeeController@get');
Route::put('/employee/update/{id}', 'App\Http\Controllers\API\EmployeeController@update');
Route::delete('/employee/delete/{id}', 'App\Http\Controllers\API\EmployeeController@delete');

Route::post('/packages/create', 'App\Http\Controllers\API\PackagesController@create');
Route::get('/packages/list', 'App\Http\Controllers\API\PackagesController@list');
Route::get('/packages/get/{id}', 'App\Http\Controllers\API\PackagesController@get');
Route::put('/packages/update/{id}', 'App\Http\Controllers\API\PackagesController@update');
Route::delete('/packages/delete/{id}', 'App\Http\Controllers\API\PackagesController@delete');