<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\penjualanController;
use App\Http\Controllers\administratorController;
use App\Http\Controllers\produkAdministratorController;
use App\Http\Controllers\petugasAdministratorController;
use App\Http\Controllers\pelangganAdministratorController;
use App\Http\Controllers\penjualanAdministratorController;

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

// Route::get('/form-login', function () {
//     return view('login');
// });

//logout
Route::post('/logout', [authController::class,'logout']);

//regiter
Route::get('/form-register',[authController::class,'formRegister']);
Route::post('/form-register',[authController::class,'register']);

//login
Route::get('/form-login',[authController::class,'formLogin']);
Route::post('/form-login',[authController::class,'login']);


//administrator
Route::get('/dashboard-administrator',[administratorController::class,'dashboardAdministrator']);

//pelanggan administrator
Route::get('/dashboard-pelanggan-administrator',[pelangganAdministratorController::class,'dashboardPelanggan']);
Route::get('/pelanggan-create-administrator',[pelangganAdministratorController::class,'create']);
Route::post('/dashboard-pelanggan-administrator',[pelangganAdministratorController::class,'store']);

//produk administrator
Route::get('/dashboard-produk-administrator',[produkAdministratorController::class,'dashboardProduk']);
Route::get('/produk-create-administrator',[produkAdministratorController::class,'create']);
Route::post('/dashboard-produk-administrator',[produkAdministratorController::class,'store']);

//penjualan administrator
Route::get('/dashboard-penjualan-administrator',[penjualanAdministratorController::class,'dashboardPenjualan']);
Route::get('/penjualan-create-administrator',[penjualanAdministratorController::class,'create']);
Route::post('/dashboard-penjualan-administrator',[penjualanAdministratorController::class,'store']);

//petugas administrator
Route::get('/dashboard-petugas-administrator',[petugasAdministratorController::class,'dashboardPetugas']);
Route::get('/petugas-create-administrator',[petugasAdministratorController::class,'create']);
Route::post('/dashboard-petugas-administrator',[petugasAdministratorController::class,'store']);

//petugas
Route::get('/dashboard-petugas',[petugasController::class,'dashboardPetugas']);

//pelanggan petugas
Route::get('/dashboard-pelanggan',[pelangganController::class,'dashboardPelanggan']);
Route::get('/pelanggan-create',[pelangganController::class,'create']);
Route::post('/dashboard-pelanggan',[pelangganController::class,'store']);

//produk petugas
// Route::get('/dashboard-produk',[produkController::class,'dashboardProduk']);
// Route::get('/produk-create',[produkController::class,'create']);
// Route::post('/dashboard-produk',[produkController::class,'store']);

//penjualan petugas
Route::get('/dashboard-penjualan',[penjualanController::class,'dashboardPenjualan']);
Route::get('/penjualan-create',[penjualanController::class,'create']);
Route::post('/dashboard-penjualan',[penjualanController::class,'store']);