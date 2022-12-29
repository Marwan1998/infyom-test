<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SecretAPIController;
// use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\UserAuthAPIController;

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


Route::post('login', [UserAuthAPIController::class, 'login']);
Route::post('register', [UserAuthAPIController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function () {
    
    // Route::get('logout', [ApiController::class, 'logout']);
    // Route::get('get_user', [ApiController::class, 'get_user']);

    Route::get('logout', [UserAuthAPIController::class, 'logout']);
    Route::get('get_info', [UserAuthAPIController::class, 'get_info']);
    
    Route::resource('secrets', SecretAPIController::class);

});