<?php


Route::namespace('V1')->prefix('v1')->group(function (){
    Route::prefix('auth')->group(function () {
        Route::post('login', 'AuthController@login')->name('auth.login');
        Route::post('logout', 'AuthController@logout')->name('auth.logout');
        Route::get('me', 'AuthController@me')->name('auth.me');
        Route::post('refresh', 'AuthController@refresh')->name('auth.refresh');
        Route::post('signup', 'AuthController@signUp')->name('auth.signup');
        Route::post('password/forget', 'AuthController@forgetPassword')->name('auth.password.forget');
        Route::post('password/reset', 'AuthController@resetPassword')->name('auth.password.rest');
    });
    Route::prefix('user')->group(function () {
        Route::post('avatar', 'UserController@avatar')->name('user.avatar');
    });
});

Route::fallback(function () {
    return response()->json([
        'message' => request()->url().' Not found',
    ], 404);
})->name('fallback');







