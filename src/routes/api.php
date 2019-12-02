<?php

use Illuminate\Http\Request;

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


Route::get('unauthorized', function() {
    return response()->json(['message' => 'unauthorized'],401);
})->name('unauthorized');

//Auth routes
Route::post('login','API\AuthController@Authenticate');

Route::resource('employees','API\EmployeeController');
