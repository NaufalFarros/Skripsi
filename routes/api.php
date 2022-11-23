<?php

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\SensorController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\dataiotController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sensor',[dataiotController::class,'ajax']);
Route::post('/',[dataiotController::class,'store']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/sensor', [SensorController::class, 'index']);
    Route::get('/user', [UserController::class, 'fetch']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/user', [UserController::class, 'updateProfile']);
    Route::post('/user/password', [UserController::class, 'updatePassword']);

});
