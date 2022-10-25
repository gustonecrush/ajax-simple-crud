<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
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

Route::get('/products', [ProductController::class, 'index']);
Route::get('/create', [ProductController::class, 'create']);
Route::get('/store', [ProductController::class, 'store']);
Route::get('/read', [ProductController::class, 'read']);
Route::get('/show/{id}', [ProductController::class, 'show']);
Route::get('/update/{id}', [ProductController::class, 'update']);
Route::get('/destroy/{id}', [ProductController::class, 'destroy']);