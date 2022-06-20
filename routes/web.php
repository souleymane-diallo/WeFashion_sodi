<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;

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

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('list.product');
    Route::get('product/{id}', 'show')->where(['id' => '[0-9]+'])->name('show.product');
    Route::get('sale', 'showProductBySale')->name('sale.product');
    Route::get('man', 'showProductByMan')->name('man.product');
    Route::get('woman', 'showProductByWoman')->name('woman.product');
});

Route::resource('admin', ProductController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
