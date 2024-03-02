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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/upload-file', [App\Http\Controllers\UploadController::class, 'index'])->name('upload.index');
Route::post('/import_parse', [\App\Http\Controllers\UploadController::class, 'parseImport'])->name('import_parse');

Route::post('/import_process', [\App\Http\Controllers\UploadController::class, 'processImport'])->name('import_process');
Route::resource('/Data',                   'App\Http\Controllers\DataController');
Route::put('/data/{data}', 'App\Http\Controllers\DataController@update')->name('data.update');


Route::resource('/client',   'App\Http\Controllers\ClientController');
Route::get('/client/{id}/add-ticket', 'App\Http\Controllers\ClientController@addTicket')->name('client.addTicket');
Route::post('client/submitTicket', 'App\Http\Controllers\ClientController@submitTicket')->name('client.submitTicket');


Route::resource('/clinic',    'App\Http\Controllers\ClinicsController');
Route::resource('/doctor',    'App\Http\Controllers\DoctorsController');
Route::resource('/employee',  'App\Http\Controllers\EmployeeController');
Route::resource('/service',   'App\Http\Controllers\ServicesController');
Route::resource('/expenses',  'App\Http\Controllers\ExpensesController');
Route::resource('/users'   ,  'App\Http\Controllers\UserController');
Route::resource('/tickets'  , 'App\Http\Controllers\TicketController');
Route::resource('/report'   , 'App\Http\Controllers\ReportController');
Route::get('/reports',        'App\Http\Controllers\ReportController@store')->name('reports');
Route::get('/dashboard2',        'App\Http\Controllers\TicketController@dashboard2')->name('tickets.dashboard2');
Route::resource('/stock'   ,  'App\Http\Controllers\StockController');

Route::post('/increase/{id}', 'App\Http\Controllers\StockController@increase')->name('stock.increase');
Route::post('/decrease/{id}', 'App\Http\Controllers\StockController@decrease')->name('stock.decrease');


Route::get('/change-password', [\App\Http\Controllers\UserController::class, 'changePasswordForm'])->name('change.password.form');
Route::post('/change-password', [\App\Http\Controllers\UserController::class, 'changePassword'])->name('change.password');













