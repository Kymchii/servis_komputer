<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CustomersKeluhanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PegawaiKeluhanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\UserAccess;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'adminMiddleware'])->name('admin.')->group(function () {
    Route::resource('/admin/customers', CustomersController::class);
    Route::resource('/admin/komputer', KomputerController::class);
    Route::resource('/admin/pegawai', PegawaiController::class);
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/barang', BarangController::class);
    Route::resource('/admin/supplier', SupplierController::class);
    Route::resource('/admin/keluhan', KeluhanController::class);
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'pegawaiMiddleware'])->name('pegawai.')->group(function () {
    Route::resource('pegawai/keluhan', PegawaiKeluhanController::class);
    Route::get('/pegawai/dashboard', [HomeController::class, 'pegawaiHome'])->name('pegawai.dashboard');
});

Route::middleware(['auth', 'customersMiddleware'])->name('customers.')->group(function () {
    Route::resource('customers/keluhan', CustomersKeluhanController::class);
    Route::get('/customers/dashboard', [HomeController::class, 'customersHome'])->name('customers.dashboard');
});

