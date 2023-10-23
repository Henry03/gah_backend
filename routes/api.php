<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('register/customer', 'registerCustomer');
    Route::post('register/pegawai', 'registerPegawai');
    Route::post('login', 'login');

    // Route after login
    Route::middleware(['auth:sanctum','ability:pegawai,customer'])->group(function () {
        Route::post('logout', 'logout');
        Route::post('change-password', 'changePassword');
    });
});

// 
Route::middleware(['auth:sanctum','ability:pegawai'])->group(function () {
    Route::get('kamar', [KamarController::class, 'index']);
    // Admin ruote access
    // Route::middleware(['role:2'])->group(function() {
        
    //     // Customer
    //     Route::controller(KamarController::class)->group(function () {
    //         Route::get('kamar', 'index');
    //         Route::post('kamar', 'store');
    //         Route::get('kamar/{id}', 'show');
    //         Route::put('kamar/{id}', 'update');
    //         Route::delete('kamar/{id}', 'destroy');
    //     });
    // });
    
    // Sales & Marketing route access
    Route::middleware(['role:4'])->group(function() {
    
        // Season
        Route::controller(SeasonController::class)->group(function () {
            Route::get('season', 'index');
            Route::post('season', 'store');
            Route::get('season/{id}', 'show');
            Route::put('season/{id}', 'update');
            Route::delete('season/{id}', 'destroy');
        });
    
        // Fasilitas
        Route::controller(FasilitasController::class)->group(function () {
            Route::get('fasilitas', 'index');
            Route::post('fasilitas', 'store');
            Route::get('fasilitas/{id}', 'show');
            Route::put('fasilitas/{id}', 'update');
            Route::delete('fasilitas/{id}', 'destroy');
        });
    
        // Tarif
        Route::controller(TarifController::class)->group(function () {
            Route::get('tarif', 'index');
            Route::post('tarif', 'store');
            Route::get('tarif/{id}', 'show');
            Route::put('tarif/{id}', 'update');
            Route::delete('tarif/{id}', 'destroy');
        });
    });
});



Route::get('customers', [CustomerController::class, 'index'])->middleware('auth:pegawai-api', 'role:1');

// Route Pegawai
Route::middleware(['auth:pegawai-api'])->group(function () {

});

// Router Customer
Route::middleware(['auth:customer-api'])->group(function () {

    Route::controller(CustomerController::class)->group(function () {
        Route::get('customer', 'show');
        Route::put('customer', 'update');
    });

    Route::controller(TransaksiController::class)->group(function () {
        Route::get('transaksi', 'indexByCustomer');
        Route::get('transaksi/{id}', 'show');
    });
});
