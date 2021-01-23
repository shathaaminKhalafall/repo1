<?php

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


Route::group(['middleware' => ['web'], 'prefix' => 'api/v1.0'], function () {
    Route::post('authenticate', 'Website\LoginController@authenticate');
    Route::post('logout', 'Auth\LoginController@logout');
    Route::post('sendResetLinkEmail', 'Website\ForgotPasswordController@sendResetLinkEmail');
    Route::post('resetPassword', 'Website\ResetPasswordController@resetPassword');

});
