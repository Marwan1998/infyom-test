<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SecretAPIController;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\UserAuthAPIController;


Route::post('login', [UserAuthAPIController::class, 'login']);
Route::post('register', [UserAuthAPIController::class, 'register']);

//  'prefix' => 'auth' // dont want it
Route::group(['middleware' => 'jwt.verify'], function () {
    Route::get('logout', [UserAuthAPIController::class, 'logout']);
    Route::resource('secrets', SecretAPIController::class);
    Route::get('get_user', [UserAuthAPIController::class, 'get_user']);
    Route::get('refresh', [UserAuthAPIController::class, 'refresh']);
});






// Route::group(['middleware' => 'api', 'prefix' => 'auth', 'namespace' => 'App\Http\Controllers\API'], function () {
// Route::group(['middleware' => ['jwt.verify']], function () {
//     Route::get('logout', [UserAuthAPIController::class, 'logout']);
//     Route::resource('secrets', SecretAPIController::class);
//     Route::get('get_user', [UserAuthAPIController::class, 'get_user']);

// });


// Route::group(['middleware' => ['jwt.verify']], function () {
//     Route::get('logout', [ApiController::class, 'logout']);
//     Route::get('get_user', [ApiController::class, 'get_user']);
//     Route::resource('secrets', SecretAPIController::class);
// });
