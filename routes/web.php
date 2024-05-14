<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', CustomersController::class);
Route::resource('komputer', KomputerController::class);
Route::resource('pegawai', PegawaiController::class);
