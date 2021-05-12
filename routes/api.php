<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;

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

Route::prefix('auth')->group(function () {

    Route::post('/register', [UserController::class, 'register']);

    Route::group(['middleware' => ['auth:api']], function () {
        // gets user with all order data
        Route::get('/user', [UserController::class, 'index']);
        // log out user
        Route::get('/logout', [UserController::class, 'logout']);
        // get all usernames
        Route::get('/allusers', [UserController::class, 'all']);
        // create conversation
        Route::post('/createconvo', [ConversationController::class, 'create']);
        // create message
        Route::post('/createmessage', [MessageController::class, 'create']);
    });
});
