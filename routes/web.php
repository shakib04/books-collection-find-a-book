<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\CricbuzzController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\Testcontroller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    //return view('pages.index');
    return redirect('/service/landing');
})->name('index');

Route::get('contact', function () {
    return view('pages.contact');
});

Route::get('about', 'App\Http\Controllers\Testcontroller@About');


Route::get('/hello', [Testcontroller::class, 'HelloFromBangladesh']);


Route::get("/Name/{name}/{age}/{gender}", [DemoController::class, 'myName']);

Route::group(["prefix" => "account"], function () {
    Route::get('/profile', function () {
        return "Profile";
    });

    Route::get('/login', function () {
        return "Login";
    });

    Route::get('/logout', function () {
        return "Log Out";
    });
});



//group middleware
Route::group(['middleware' => ['age']], function () {
    Route::get('/test', function () {
        //value passing with view
        return view('test', ['name' => 'Shakib', "age" => 19]);
    });


    Route::get('welcome', function () {
        return view('welcome');
    });
});

Route::get('notAdult', function () {
    return view('notAdult');
});


Route::get('justRouteTest', function () {
    return "Testing name route";
})->name('test');


Route::get('login', [LoginController::class, 'LoginPage']);

Route::get('/home', function () {
    return view('class_work.home');
});

Route::post('login', [LoginController::class, 'verify']);

Route::get('nav', [LoginController::class, 'valueSend']);


//cricbuzz routing with extends

Route::get('cricbuzz', [CricbuzzController::class, 'home'])->name('home');

Route::get('scores', function () {
    return view('cricbuzz.scores');
});


Route::get('getAllUsers', [UserController::class, 'getAllUsers']);
Route::get('userDetails', [UserController::class, 'userDetails']);
Route::get('deleteUser/{id}', [UserController::class, 'deleteUser']);
Route::post('deleteUser/{id}', [UserController::class, 'confDeleteUser']);

Route::get('/Employee', function () {
    $jsonString = file_get_contents(base_path('resources/my_json_files/userData.json'));
    $data = json_decode($jsonString, true);

    // Update Key
    $data['employees'][0]['firstName'] = "Shakib";
    $data['employees'][0]['lastName'] = "Alam";

    // Write File

    $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents(base_path('resources/my_json_files/userData.json'), stripslashes($newJsonString));


    print_r($data);
});


Route::get('/write', [PostController::class, "writePost"]);
Route::get('/add/category', [CategoryController::class, "Add"])->name('add.category');
Route::post('/add/category', [CategoryController::class, "StoreCategory"])->name('Store.Category');


//logout 
Route::get('/logout', function (Request $request) {
    $request->session()->flush();
    return redirect('/book/user/login');
})->name('logout');


//admin
Route::get('/admin/Dashboard', [AdminController::class, 'AdminDash'])->middleware('loginSession');
//user
Route::get('/user/home', [UserController::class, 'UserHome']);




//book_mid_project

//Book_Mid_Project
Route::get('/book/user/login', function () {
    return view('Book_Mid_Project.login');
})->name('login');

Route::post('/book/user/login', [LoginController::class, 'BookProjectUserLogin']);

Route::get('/book/user/signup', function () {
    return view('Book_Mid_Project.signup');
});

Route::post('/book/user/signup', [UserController::class, 'UserRegistration']);

Route::get('/service/landing', function () {
    return view('Book_Mid_Project.landing_page.landing');
});

Route::get('/book/list', [BookController::class, 'getAllBooksForHome']);


Route::get('/book/details/{id}', [BookController::class, 'BookById'])->name('BookById');



Route::get('/book/test', function () {
    return view('Book_Mid_Project._layout_2');
});



Route::middleware(['authorization'])->group(function () {

    Route::post('/book/details/{id}', [BookController::class, 'AddToCart']);

    //add to wish
    Route::get('/add/wishlist/{id}', [BookController::class, 'AddToWishList']);
    Route::get('/add/wishlist/force/{id}', [BookController::class, 'AddToWishListForce']);

    //remove wishitem
    Route::get('/remove/wishlist/{bookid}', [BookController::class, 'RemoveWishList']);

    //wish list (myaccount)
    Route::get('/user/wishlist', [BookController::class, 'GetWishList'])->name('WishList');

    Route::get('/book/search', function () {
        return view('Book_Mid_Project.search');
    });

    Route::get('/book/shopping/cart', [BookController::class, 'showCart']);

    //make order
    Route::get('/book/checkout', [PurchaseController::class, 'CheckoutPage'])->middleware('BlankCart');
    Route::post('/book/checkout', [PurchaseController::class, 'MakeOrder'])->middleware('BlankCart');

    Route::get('/user/blankcart', function(){
        return view('Book_Mid_Project.my_account.empty_cart');
    });

    //user crud
    Route::get('/user/profile', function () {
        return view('Book_Mid_Project.user_profile');
    });

    Route::get('/user/myaccount', [UserController::class, 'MyAccount'])->name('Dashboard');
    Route::post('/user/myaccount', [UserController::class, 'EditProfile']);

    //address
    Route::get('/user/add/address', [AddressController::class, 'CreateAddress'])->name('CreateAddress');
    Route::post('/user/add/address', [AddressController::class, 'StoreAddress']);
    Route::get('/user/myaccount/address', [UserController::class, 'MyAddress'])->name('MyAddress');
    Route::get('/user/edit/address/{id}', [UserController::class, 'EditAddress']);
    Route::post('/user/edit/address/{id}', [UserController::class, 'UpdateAddress']);
    Route::get('/user/delete/address/{id}', [AddressController::class, 'DeleteAddress']);
    Route::get('/user/confDelete/address/{id}', [AddressController::class, 'ConfirmDelete']);
});



Route::get('/user/notify', function () {
    return view('Book_Mid_Project.notification');
});

Route::get('/user/order/orderId', function () {
    return view('Book_Mid_Project.order_received');
})->name('order_received_confirm');



//all categories

Route::get('all/cats', [CategoryController::class, 'getAllCategories']);


//product
Route::get('product/all', [ProductController::class, 'index']);
Route::get('product/create', [ProductController::class, 'create']);
Route::post('product/create', [ProductController::class, 'store']);
Route::get('product/show/{id}', [ProductController::class, 'show']);
Route::get('product/edit/{id}', [ProductController::class, 'edit']);
Route::post('product/edit/{id}', [ProductController::class, 'update']);
Route::get('product/delete/{id}', [ProductController::class, 'destroy']);
