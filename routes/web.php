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
use App\Routerdata;
use Illuminate\Http\Request;

Route::get('/', 'RouterdataController@index')->name('routerdata.index');
Route::get('/routerdata', 'RouterdataController@index')->name('routerdata.index');
Route::get('/posts/details/{id}', 'RouterdataController@details')->name('routerdata.details');
Route::get('/routerdata/add', 'RouterdataController@add')->name('routerdata.add');
Route::post('/routerdata/insert', 'RouterdataController@insert')->name('routerdata.insert');
Route::get('/routerdata/edit/{id}', 'RouterdataController@edit')->name('routerdata.edit');
Route::post('/routerdata/update/{id}', 'RouterdataController@update')->name('routerdata.update');
Route::get('/routerdata/delete/{id}', 'RouterdataController@delete')->name('routerdata.delete');

/*Route::get('/', function () {
    return view('welcome');
});*/
