<?php

use Illuminate\Http\Request;
// use Illuminate\Routing\Route;

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


// User //

Route::get('users','Api\AuthController@index');

Route::get('users/{id}','Api\AuthController@show');

Route::post('users','Api\AuthController@store');

Route::put('users','Api\AuthController@store');

Route::delete('users/{id}','Api\AuthController@destroy');



// Chatbot //

Route::get('chatbot','Api\Chatbot\ChatbotController@index');

Route::post('chatbot','Api\Chatbot\ChatbotController@store');

