<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PurchaseController;

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

//login
Route::post('/user/login', [LoginController::class, 'BookProjectUserLogin']);

//address
Route::get('/user/myaccount/address', [AddressController::class, 'MyAddress'])->name('MyAddress');
Route::get('/user/address/{id}', [AddressController::class, 'GetAddressById']);
Route::post('/user/add/address', [AddressController::class, 'StoreAddress']);
Route::post('/user/edit/address/{id}', [AddressController::class, 'UpdateAddress']);
Route::delete('/user/address/confDelete/{id}', [AddressController::class, 'ConfirmDelete']);


//user profile
Route::get('/user/myaccount', [UserController::class, 'MyAccount'])->name('Dashboard');
Route::post('/user/profile/update', [UserController::class, 'EditProfile']);

//change password
Route::post('/user/changepassword', [UserController::class, 'ChangePassword'])->name('ChangePassword');

//book list, search, get by id
Route::get('/book/list', [BookController::class, 'getAllBooksForHome']);
Route::get('/book/search/p', [BookController::class, 'SearchBooks']);
Route::get('/book/details/{id}', [BookController::class, 'BookById'])->name('BookById');

//cart
Route::get('/book/cart/list', [BookController::class, 'showCart']); //http://localhost:8000/api/book/cart/list?userid=1
Route::post('/book/add/cart/{id}', [BookController::class, 'AddToCart']);


//order
//make order
Route::get('/book/checkout', [PurchaseController::class, 'CheckoutPage'])->middleware('BlankCart');
Route::post('/order/checkout', [PurchaseController::class, 'MakeOrder']); //->middleware('BlankCart')
//order list myaccount 
Route::get('/user/myaccount/orders', [PurchaseController::class, 'OrderList'])->name('OrderList');
//order by id
Route::get('/user/order/{id}', [PurchaseController::class, 'GetOrderById'])->name('order_received_confirm');

//wishlist
//add to wish
Route::get('/add/wishlist/{id}', [BookController::class, 'AddToWishList']);
Route::get('/add/wishlist/force/{id}', [BookController::class, 'AddToWishListForce']);
//remove wishitem
Route::get('/remove/wishlist/{bookid}', [BookController::class, 'RemoveWishList']);
//wish list (myaccount)
Route::get('/user/wishlist', [BookController::class, 'GetWishList'])->name('WishList');
