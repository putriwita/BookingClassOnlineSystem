<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ListRequestController;


Route::group(['domain' => ''], function() {
    Route::get('admin/auth',[AuthController::class, 'index'])->name('admin.auth.index');
    Route::prefix('admin/')->name('admin.')->group(function(){
        Route::prefix('auth')->name('auth.')->group(function(){
            Route::post('login',[AuthController::class, 'do_login'])->name('login');
        });
        Route::middleware(['auth:admin'])->group(function(){
            Route::get('logout',[AuthController::class, 'do_logout'])->name('logout');
        });
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('listrequest', ListRequestController::class);
        Route::delete('listrequest/{listrequest}/destroy', [ListRequestController::class, 'destroy'])->name('listrequest.destroy');
        Route::post('listrequest/{listrequest}/approved',[ListRequestController::class,'approved'])->name('listrequest.approved');
        Route::post('listrequest/{listrequest}/rejected',[ListRequestController::class,'rejected'])->name('listrequest.rejected');
        // Route::post('rooms/{rooms}/approved',[ListRequestController::class,'approved'])->name('listrequest.approved');
    });
});
