<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\documents;

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
