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
//Login & Register
Route::post('login','App\Http\Controllers\Api\Auth\AuthController@login');
Route::post('register','App\Http\Controllers\Api\Auth\AuthController@register');

Route::middleware('auth:sanctum')->group(function () {
    //Logout & me
    Route::post('logout','App\Http\Controllers\Api\Auth\AuthController@logout');
    Route::get('me','App\Http\Controllers\Api\Auth\AuthController@me');

    //Calculator
    Route::post('calculate','App\Http\Controllers\Api\CalculationController@store');
    Route::get('calculations','App\Http\Controllers\Api\CalculationController@index');
});
