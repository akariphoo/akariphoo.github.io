<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'index']);

Route::get('/users', [AdminController::class, 'user']);

Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUser']);

Route::get('/showFoodMenu', [AdminController::class, 'showFoodMenu']);

Route::get('/createFoodMenu', [AdminController::class, 'createFoodMenu']);

Route::post('/storeFoodMenu', [AdminController::class, 'storeFoodMenu']);

Route::get('/deleteFoodMenu/{id}', [AdminController::class, 'deleteFoodMenu']);

Route::get('/updateViewFoodMenu/{id}', [AdminController::class, 'updateViewFoodMenu']);

Route::post('/updateFoodMenu/{id}', [AdminController::class, 'updateFoodMenu']);

Route::post('/reservation', [AdminController::class, 'reservation']);

Route::get('/showReservation', [AdminController::class, 'showReservation']);

Route::get('/viewFoodChef', [AdminController::class, 'viewFoodChef']);

Route::get('/createFoodChef', [AdminController::class, 'createFoodChef']);

Route::post('/storeFoodChef', [AdminController::class, 'storeFoodChef']);

Route::get('/deleteFoodChef/{id}', [AdminController::class, 'deleteFoodChef']);

Route::get('/updateFoodChefView/{id}', [AdminController::class, 'updateFoodChefView']);

Route::post('/updateFoodChef/{id}', [AdminController::class, 'updateFoodChef']);

Route::get('/orderConfirm/{id}', [AdminController::class, 'orderConfirm']);

Route::get('/orderCancel/{id}', [AdminController::class, 'orderCancel']);


Route::post('/addtoCart/{id}', [HomeController::class, 'addtoCart']);

Route::get('/showCart/{id}', [HomeController::class, 'showCart']);

Route::get('/removeFromCart/{id}', [HomeController::class, 'removeFromCart']);

Route::post('/orderConfirm', [HomeController::class, 'orderConfirm']);

Route::get('/showOrder', [AdminController::class, 'showOrder']);

Route::get('/orderDetail/{id}', [AdminController::class, 'orderDetail']);

Route::post('/search', [AdminController::class, 'search']);

Route::post('/searchDate', [AdminController::class, 'searchDate']);

Route::get('/redirects', [HomeController::class, 'redirects']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
