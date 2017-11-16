<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// route for creating access_token
Route::post('accessToken', 'Api\AccessTokenController@createAccessToken');

Route::group(['middleware' => 'api.auth'], function () use ($router) {
    Route::post('users', 'Api\UserController@store');
    Route::get('users', 'Api\UserController@index');
    Route::get('users/{id}', 'Api\UserController@show');
    Route::put('users/{id}', 'Api\UserController@update');
    Route::delete('users/{id}', 'Api\UserController@destroy');
});
