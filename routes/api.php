<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\JenisKamarController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ReservasiController;
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
    Route::middleware(['auth:sanctum','ability:customer,owner,admin,sm,gm,fo'])->group(function () {
        Route::post('logout', 'logout');
        Route::post('change-password', 'changePassword');
        Route::get('sign-in-check', 'signedinCheck');
    });
});

Route::middleware(['auth:sanctum','ability:owner,admin,sm,gm,fo'])->group(function () {
    Route::controller(PegawaiController::class)->group(function () {
        Route::get('pegawai', 'show');
        Route::put('pegawai', 'update');
    });
});
// 
Route::middleware(['auth:sanctum','ability:admin'])->group(function () {
    Route::post('search/kamar', [KamarController::class, 'search']);
    // Admin ruote access
    // Route::middleware(['ability:2'])->group(function() {
        
    // Customer
    Route::controller(KamarController::class)->group(function () {
        Route::get('kamar', 'index');
        Route::post('kamar', 'store');
        Route::get('kamar/{id}', 'show');
        Route::put('kamar/{id}', 'update');
        Route::delete('kamar/{id}', 'destroy');
    });
});
    
// Sales & Marketing route access
Route::middleware(['auth:sanctum','ability:sm'])->group(function() {
    
    Route::controller(JenisKamarController::class)->group(function () {
        Route::get('jenis-kamar', 'index');
    });
    // Season
    Route::controller(SeasonController::class)->group(function () {
        Route::get('season', 'index');
        Route::get('all/season', 'all');
        Route::post('season', 'store');
        Route::get('season/{id}', 'show');
        Route::put('season/{id}', 'update');
        Route::delete('season/{id}', 'destroy');
        Route::post('search/season', 'search');
    });

    // Fasilitas
    Route::controller(FasilitasController::class)->group(function () {
        Route::get('fasilitas', 'index');
        Route::post('fasilitas', 'store');
        Route::get('fasilitas/{id}', 'show');
        Route::put('fasilitas/{id}', 'update');
        Route::delete('fasilitas/{id}', 'destroy');
        Route::post('search/fasilitas', 'search');
    });

    // Tarif
    Route::controller(TarifController::class)->group(function () {
        Route::get('tarif', 'index');
        Route::post('tarif', 'store');
        Route::get('tarif/{id}', 'show');
        Route::put('tarif/{id}', 'update');
        Route::delete('tarif/{id}', 'destroy');
        Route::post('search/tarif', 'search');
    });

    // Customer
    Route::controller(CustomerController::class)->group(function () {
        Route::post('customer/grup', 'indexGrup');
        Route::put('customer/{id}', 'update');
        Route::get('customer/{id}', 'showDetail');
    });

    Route::controller(ReservasiController::class)->group(function () {
        Route::post('reservasi/all', 'index');
    });
});



Route::get('customers', [CustomerController::class, 'index'])->middleware('auth:pegawai-api', 'role:1');


// Router Customer
Route::middleware(['auth:sanctum', 'ability:customer'])->group(function () {
    // Route::put('customer', [CustomerController::class, 'update']);
    Route::controller(CustomerController::class)->group(function () {
        Route::get('customer', 'show');
        Route::put('customer', 'update');
    });

    Route::controller(TransaksiController::class)->group(function () {
        Route::get('transaksi', 'indexByCustomer');
        Route::get('transaksi/{id}', 'show');
    });

    
});

Route::middleware(['auth:sanctum', 'ability:customer,sm'])->group(function () {
    Route::controller(ReservasiController::class)->group(function () {
        Route::get('reservasi', 'indexByCustomer');
        Route::get('reservasi/{id}', 'show');
        Route::get('reservasi/{id}/kamar', 'showKamar');
        Route::get('reservasi/{id}/layanan', 'showLayanan');
    });
});
