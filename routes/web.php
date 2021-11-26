<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/inventory', [App\Http\Controllers\ProductsController::class, 'index']);
Route::get('/edit/{id}', [App\Http\Controllers\ProductsController::class, 'edit']);
Route::post('/addProduct', [App\Http\Controllers\ProductsController::class, 'store']);
Route::post('/updateProduct/{id}', [App\Http\Controllers\ProductsController::class, 'update']);
Route::get('/product/delete/{id}', [App\Http\Controllers\ProductsController::class, 'destroy']);
Route::get('/getProduct/{id}', [App\Http\Controllers\ProductsController::class, 'show']);


Route::get('/cart/{id}', [App\Http\Controllers\CartController::class, 'index']);
Route::post('/add', [App\Http\Controllers\CartController::class, 'store']);
Route::get('/remove/{id}', [App\Http\Controllers\CartController::class, 'destroy']);
Route::post('/checkout', [App\Http\Controllers\CartController::class, 'update']);

Route::get('/myorders', [App\Http\Controllers\OrdersController::class, 'index']);
Route::get('/cancel/{id}', [App\Http\Controllers\OrdersController::class, 'destroy']);
Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'orders']);
Route::get('/process/{id}', [App\Http\Controllers\OrdersController::class, 'update']);
Route::get('/complete/{id}', [App\Http\Controllers\OrdersController::class, 'complete']);



