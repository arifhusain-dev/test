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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');

Route::middleware('auth:api')->group(function(){

    Route::post('user_detail', 'API\AuthController@user_detail');
    Route::post('router_detail', 'API\AuthController@router_detail');
    Route::post('create', 'API\AuthController@create');
    Route::post('rangelist', 'API\AuthController@rangelist');
    Route::post('listsaptype', 'API\AuthController@listsaptype');

});
