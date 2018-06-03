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

/* version 1 */
Route::group(['prefix' => 'v1'], function () {
    /* posts */
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostController@index');
    });
});
