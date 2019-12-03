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

//Auth routes
Route::post('login', 'API\AuthController@Authenticate');

//Resources
Route::resource('employees', 'API\EmployeeController');
Route::resource('tickets', 'API\TicketController');

//Ticket status list
Route::get('tickets-status', 'API\TicketStatusController');

Route::get('tickets/{ticketId}/assign/{employeeId}','API\TicketController@addEmployeeToTicket');
