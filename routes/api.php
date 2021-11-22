<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;

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


Route::get('quotes', 'App\Http\Controllers\QuoteController@index');
Route::get('quotes/{id?}', 'App\Http\Controllers\QuoteController@show')->middleware("JwtAuth");
Route::post('quotes', 'App\Http\Controllers\QuoteController@store')->middleware("auth:api");


