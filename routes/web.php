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

require __DIR__.'/auth.php';
