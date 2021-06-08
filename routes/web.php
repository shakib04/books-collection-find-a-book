<?php

use App\Http\Controllers\CricbuzzController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Testcontroller;
use App\Http\Controllers\UserController;
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
    return view('pages.index');
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

Route::get('/Employee', function () {
    $jsonString = file_get_contents(base_path('resources/my_json_files/userData.json'));
    $data = json_decode($jsonString, true);

    // Update Key
    $data['employees'][0]['firstName'] = "Shakib";
    $data['employees'][0]['lastName'] = "Mia";
    //$data['employees.title'] = "Change Manage Country";

    // Write File

    $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents(base_path('resources/my_json_files/userData.json'), stripslashes($newJsonString));


    print_r($data);
});
