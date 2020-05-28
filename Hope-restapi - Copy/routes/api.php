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

Route::post('login','LoginController@login');
Route::post('register', 'LoginController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('patient','PatientController@index');
Route::get('patient/{id}','PatientController@getId');
Route::post('/patient','PatientController@create');
Route::put('/patient/update/{id}','PatientController@update');
Route::delete('/patient/{id}','PatientController@delete');
Route::get('people','PeopleController@index');
Route::get('people/{id}','PeopleController@getId');
Route::post('/people','PeopleController@create');
Route::put('/people/update/{id}','PeopleController@update');
Route::delete('/people/{id}','PeopleController@delete');
