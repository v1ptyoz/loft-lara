<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;

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
    return view('shop/index');
});

Route::get('/about', function () {
    return view('shop/about');
});

Route::get('/news', function () {
    return view('shop/news');
});

Route::get('/orders', function () {
    return view('shop/cart1');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/logout', '\App\Http\Controllers\Auth\Controller@destroy');

Route::get('/admin', [AdminController::class, 'index'])->middleware('isAdmin');

Route::get('/admin/categories', [CategoryController::class, 'index'])->name("admin.categories")->middleware('isAdmin');
Route::post('/admin/category', [CategoryController::class, 'create'])->name("category.create")->middleware('isAdmin');
Route::post('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name("category.edit")->middleware('isAdmin');
Route::post('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name("category.delete")->middleware('isAdmin');

Route::get('/admin/items', [ItemController::class, 'items'])->name("admin.items")->middleware('isAdmin');
Route::get('/admin/orders', [OrderController::class, 'orders'])->name("admin.orders")->middleware('isAdmin');



require __DIR__.'/auth.php';
