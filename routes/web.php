<?php

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
    $products=Product::where('status',1)->latest()->get();
    return view('welcome',compact('products'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('product', [\App\Http\Controllers\ProductController::class,'index'])->name('product');
    Route::post('product', [\App\Http\Controllers\ProductController::class,'create'])->name('product.create');
    Route::get('product/{id}', [\App\Http\Controllers\ProductController::class,'edit'])->name('product.edit');
    Route::put('product/update/{id}', [\App\Http\Controllers\ProductController::class,'update'])->name('product.update');
    Route::get('product/delete/{id}', [\App\Http\Controllers\ProductController::class,'delete'])->name('product.delete');





    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
