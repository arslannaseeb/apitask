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


Route::post('login', 'api\Auth\LoginController@login');

Route::get('/cars','api\CarController@index');

Route::post('/car/add','api\CarController@store');

Route::post('/car/edit','api\CarController@update');

Route::delete('/car/delete','api\CarController@delete');
