<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\documents;
use App\Http\Controllers\blog;
use App\Http\Controllers\propos;
use App\Http\Controllers\email;

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
    return view('layout.app');
});
Route::get('/documents/list','App\Http\Controllers\documents\DocController@index');
Route::get('/apropos','App\Http\Controllers\propos\PropController@index');
Route::get('/contact','App\Http\Controllers\contact\ContactController@index');
Route::post('/sendmail','App\Http\Controllers\contact\ContactController@send');
Route::get('/blog','App\Http\Controllers\blog\BlogController@index');
Route::get('/sendmail','App\Http\Controllers\contact\ContactController@index');
Route::post('/email','App\Http\Controllers\email\EmailController@index');
