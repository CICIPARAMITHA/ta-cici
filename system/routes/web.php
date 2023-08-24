<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('load', 'load');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('logout', 'logout');
    Route::post('login', 'loginProses');
});





Route::prefix('admin')->middleware('auth')->group(function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('beranda', 'beranda');
        Route::get('profil', 'profil');
        Route::post('profil/update', 'update');
        Route::get('chart', 'chart');
    });

});





