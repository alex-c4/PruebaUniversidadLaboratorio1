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

Route::get('/state/{id}', 'StateController@byCountry');

Route::get('/city/{id}', 'CityController@byState');


/**
 * API para lecturas de correos
 */
Route::get('emailForgotPassw', [
        'as' => 'emailForgotPassw', 
        'uses' => 'API\EmailsForgotPasswController@index'
    ]);
Route::post('emailForgotPasswUpdate', [
        'as' => 'emailForgotPasswUpdate', 
        'uses' => 'API\EmailsForgotPasswController@update'
    ]);
Route::post('destroyEmailForgotPassw/{id}', [
        'as' => 'destroyEmailForgotPassw', 
        'uses' => 'API\EmailsForgotPasswController@destroy'
    ]);
// Route::apiResources([
//     'emailForgotPassw' => 'API\EmailsForgotPasswController'
// ]);

