<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestApiController;
use App\Http\Controllers\UserController;

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

Route::apiResource('/test', TestApiController::class);

Route::get('/test2', function () {
    return "test 2";
});

Route::get('getAllUsers', [UserController::class, 'getAllUsers']);
Route::post('insertNewUser', [UserController::class, 'insertNewUser']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
