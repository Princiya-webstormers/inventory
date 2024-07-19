<?php

use App\Enums\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return view('home');
});


Route::get('/frontend-login', function () {
    return view('auth.frontend_login');
});

Route::group(['prefix' => 'super-admin', 'middleware' => ['auth', 'user-access:'.UserType::SUPERADMIN]], function () {
    Route::get('/dashboard', 'UserController@index');
    Route::get('/account', 'SettingsController@index');
    Route::post('/account', 'SettingsController@profileUpdate');
    Route::get('/product/create', 'InventoryController@create');
    Route::get('/product', 'InventoryController@index');
    Route::post('/product', 'InventoryController@store');
    Route::get('/product/{inventory}/edit', 'InventoryController@edit');
    Route::post('/product/{inventory}', 'InventoryController@statusUpdate');
    Route::put('/product/{inventory}', 'InventoryController@update');
    Route::delete('/product/{inventory}', 'InventoryController@destroy');

    Route::get('/user/create', 'UserController@create');
    Route::get('/user', 'UserController@index');
    Route::get('/user/{user}', 'UserController@view');
    Route::post('/user', 'UserController@store');
    Route::get('/user/{user}/edit', 'UserController@edit');
    Route::put('/user/{user}', 'UserController@update');
    Route::delete('/user/{user}', 'UserController@destroy');

    Route::get('/report', 'ReportController@report');
    Route::get('/report-filter', 'ReportController@reportFilter');
    Route::get('/report-filter-course', 'ReportController@reportFilter');

    Route::get('/role', 'UserController@roleIndex');
    Route::get('/role/create', 'UserController@roleCreate');
    Route::post('/role', 'UserController@roleStore');
    Route::get('/role/{id}/edit', 'UserController@roleEdit');
    Route::put('/role/{id}', 'UserController@roleUpdate');
    Route::delete('/role/{role}', 'UserController@roleDestroy');


});
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'user-access:'.UserType::ADMIN]], function () {
    Route::get('/account', 'SettingsController@index');
    Route::post('/account', 'SettingsController@profileUpdate');
    Route::get('/product/create', 'InventoryController@create');
    Route::get('/product', 'InventoryController@index');
    Route::post('/product', 'InventoryController@store');
    Route::get('/product/{inventory}/edit', 'InventoryController@edit');
    Route::post('/product/{inventory}', 'InventoryController@statusUpdate');
    Route::put('/product/{inventory}', 'InventoryController@update');
    Route::delete('/product/{inventory}', 'InventoryController@destroy');


    Route::get('/report', 'ReportController@report');
    Route::get('/report-filter', 'ReportController@reportFilter');
    Route::get('/report-filter-course', 'ReportController@reportFilter');


});
Route::get('user/compressor/pdf/{compressor}', 'CompressorController@pdfDownload');


