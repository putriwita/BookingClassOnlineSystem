<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\BookingController;
use App\Http\Controllers\Web\HistoryController;
use App\Http\Controllers\Web\RequestController;
use App\Http\Controllers\Web\UserEditController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\DataRuanganController;


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

Route::group(['domain' => ''], function() {
    Route::get('auth',[AuthController::class, 'index'])->name('auth.index');
    Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');
    Route::prefix('auth')->name('auth.')->group(function(){
        Route::post('register',[AuthController::class, 'do_register'])->name('register');
        Route::post('login',[AuthController::class, 'do_login'])->name('login');
    });
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dahsboard');
    Route::get('logout',[AuthController::class, 'do_logout'])->name('logout');
    Route::resource('dashboard', DashboardController::class);
    Route::get('booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('booking/create', [BookingController::class, 'request'])->name('booking.request');
    Route::get('booking/{id}/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('booking/{booking}/show', [BookingController::class, 'show'])->name('booking.show');
    Route::get('booking/{booking}/edit', [BookingController::class, 'edit'])->name('booking.edit');
    Route::patch('booking/{booking}', [BookingController::class, 'update'])->name('booking.update');
    Route::delete('booking/{booking}/destroy', [BookingController::class, 'destroy'])->name('booking.destroy');
    Route::resource('book', BookingController::class);   
    Route::resource('dataruangan', DataRuanganController::class);
    Route::get('user', [UserEditController::class, 'index'])->name('user.index');
    Route::get('edit', [UserEditController::class, 'edit'])->name('user.update');
    Route::post('user/update', [UserEditController::class, 'update'])->name('user.update');
    Route::resource('history', HistoryController::class);
});