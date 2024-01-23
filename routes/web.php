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

Route::get('/products',[App\Http\Controllers\HomeController::class,'products'])->name('products');
Route::get('/invoice',[App\Http\Controllers\HomeController::class,'invoice'])->name('invoice');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/add_quantity',[App\Http\Controllers\HomeController::class,'add_quantity'])->name('add_quantity');
