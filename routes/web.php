<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\galeriController;
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
Route::get('/pelanggan-administrator/{idPelanggan}/edit', [pelangganAdministratorController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan-administrator/{id}', [pelangganAdministratorController::class, 'update'])->name('pelanggan.update');
Route::get('/pelanggan-administrator/{idPelanggan}', [pelangganAdministratorController::class, 'destroy'])->name('pelanggan.destroy');

//produk administrator
Route::get('/dashboard-produk-administrator',[produkAdministratorController::class,'dashboardProduk']);
Route::get('/produk-create-administrator',[produkAdministratorController::class,'create']);
Route::post('/dashboard-produk-administrator',[produkAdministratorController::class,'store']);
Route::get('/produk-administrator/{idProduk}/edit', [produkAdministratorController::class, 'edit'])->name('produk.edit');
Route::put('/produk-administrator/{id}', [produkAdministratorController::class, 'update'])->name('produk.update');
Route::get('/produk-administrator/{idProduk}', [produkAdministratorController::class, 'destroy'])->name('produk.destroy');

//penjualan administrator
Route::get('/dashboard-penjualan-administrator',[penjualanAdministratorController::class,'dashboardPenjualan']);
// Route::get('/penjualan-create-administrator',[penjualanAdministratorController::class,'create']);
// Route::post('/dashboard-penjualan-administrator',[penjualanAdministratorController::class,'store']);
// Route::get('/penjualan-administrator/{idPenjualan}/edit', [penjualanAdministratorController::class, 'edit'])->name('penjualan.edit');
// Route::put('/penjualan-administrator/{id}', [penjualanAdministratorController::class, 'update'])->name('penjualan.update');

//petugas administrator
Route::get('/dashboard-petugas-administrator',[petugasAdministratorController::class,'dashboardPetugas']);
Route::get('/petugas-create-administrator',[petugasAdministratorController::class,'create']);
Route::post('/dashboard-petugas-administrator',[petugasAdministratorController::class,'store']);
Route::get('/petugas-administrator/{idPetugas}/edit', [petugasAdministratorController::class, 'edit'])->name('petugas.edit');
Route::put('/petugas-administrator/{id}', [petugasAdministratorController::class, 'update'])->name('petugas.update');
Route::get('/petugas-administrator/{idPetugas}', [petugasAdministratorController::class, 'destroy'])->name('petugas.destroy');

//petugas
Route::get('/dashboard-petugas',[petugasController::class,'dashboardPetugas']);

//pelanggan petugas
Route::get('/dashboard-pelanggan',[pelangganController::class,'dashboardPelanggan']);
Route::get('/pelanggan-create',[pelangganController::class,'create']);
Route::post('/dashboard-pelanggan',[pelangganController::class,'store']);
Route::get('/pelanggan/{idPelanggan}/edit', [pelangganController::class, 'edit'])->name('pelanggan.petugas.edit');
Route::put('/pelanggan/{id}', [pelangganController::class, 'update'])->name('pelanggan.petugas.update');
Route::get('/pelanggan-petugas/{idPelanggan}', [pelangganController::class, 'destroy'])->name('pelanggan.petugas.destroy');

//penjualan petugas
Route::get('/dashboard-penjualan',[penjualanController::class,'dashboardPenjualan']);
Route::get('/penjualan-create',[penjualanController::class,'create']);
Route::post('/dashboard-penjualan',[penjualanController::class,'store']);

//galeri
Route::get('/dashboard-galeri',[galeriController::class,'dashboardGaleri']);
Route::get('/galeri-create',[galeriController::class,'create']);
Route::post('/dashboard-galeri',[galeriController::class,'store']);
Route::get('/galeri/{idGaleri}/edit', [galeriController::class, 'edit'])->name('galeri.edit');
Route::put('/galeri/{id}', [galeriController::class, 'update'])->name('galeri.update');
Route::get('/galeri/{idGaleri}', [galeriController::class, 'destroy'])->name('galeri.destroy');