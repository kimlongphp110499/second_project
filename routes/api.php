<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\UserPostController;
use App\Http\Controllers\Api\AdminPostController;
use App\Http\Controllers\Api\ReplyPostController;

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


Route::group([
    'prefix' => 'user'
], function ($router) {
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']); 
    Route::group([
        'middleware' => 'auth:users',
        'prefix' => 'post'
    ], function ($router) {
        Route::post('/update/{id}', [UserPostController::class, 'update']);
        Route::delete('/delete/{id}', [UserPostController::class, 'delete']);
        Route::post('/reply/{id}', [ReplyPostController::class, 'reply']);
    });
});
Route::group([
    'prefix' => 'admin'
], function ($router) {
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/register', [AdminController::class, 'register']);
   
    Route::group([
        'middleware' => 'auth:admins',
        'prefix' => 'post'
    ], function ($router) {
        Route::delete('/delete/{id}', [AdminPostController::class, 'delete']); 
    });
     
});
