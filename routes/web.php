<?php

use App\Http\Controllers\GarduIndukController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PenyulangController;
use App\Http\Controllers\TableDataPenyulangController;
use App\Http\Controllers\TableDataTrafoDayaController;
use App\Http\Controllers\TrafoDayaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('penyulangs', PenyulangController::class);
Route::resource('trafo_dayas', TrafoDayaController::class);
Route::resource('gardu_induks', GarduIndukController::class);
Route::resource('table_data_trafo_dayas', TableDataTrafoDayaController::class);
Route::resource('table_data_penyulangs', TableDataPenyulangController::class);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class,'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class,'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class,'dashboard']);
Route::get('logout', [AuthController::class,'logout'])->name('logout');
Route::get('abc', [AuthController::class,'abc'])->name('abc');