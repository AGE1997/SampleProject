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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class], 'index')->name('admin');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'video', 'middleware' => 'auth'], function () {
    // Route::get('index', 'VideosController@index');
    Route::get('index/{id}', [App\Http\Controllers\VideoController::class, 'index'])->name('video.index');
    Route::get('create', [App\Http\Controllers\VideoController::class, 'create'])->name('video.create');
    Route::post('store', [App\Http\Controllers\VideoController::class, 'store'])->name('video.store');
    Route::get('show/{id}', [App\Http\Controllers\VideoController::class, 'show'])->name('video.show');
    Route::get('edit/{id}', [App\Http\Controllers\VideoController::class, 'edit'])->name('video.edit');
    Route::post('update/{id}', [App\Http\Controllers\VideoController::class, 'update'])->name('video.update');
    Route::post('destroy/{id}', [App\Http\Controllers\VideoController::class, 'destroy'])->name('video.destroy');
});


Route::get('/order/create/{id}', [App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
Route::post('/order/payment', [App\Http\Controllers\OrderController::class, 'payment'])->name('payment');
Route::post('/order/store/{id}', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
