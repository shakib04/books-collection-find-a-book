<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;

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

// http://localhost:8000/api/

//address
Route::get('/user/myaccount/address', [AddressController::class, 'MyAddress'])->name('MyAddress');
Route::post('/user/add/address', [AddressController::class, 'StoreAddress']);
Route::post('/user/edit/address/{id}', [AddressController::class, 'UpdateAddress']);
Route::delete('/user/confDelete/address/{id}', [AddressController::class, 'ConfirmDelete']);
