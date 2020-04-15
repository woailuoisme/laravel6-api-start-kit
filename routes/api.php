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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::namespace('V1')->prefix('v1')->group(function (){
    Route::prefix('auth')->group(function ($router) {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::get('me', 'AuthController@me');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('signup', 'AuthController@signUp');

        Route::post('password/forget', 'AuthController@forgetPassword');
        Route::post('password/reset', 'AuthController@resetPassword');
    });
});


Route::fallback(function () {
    return response()->json([
        'message' => \request()->url() .' Not found'
    ], 404);
})->name('fallback');






