<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\administratorController;

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


//regiter
Route::get('/form-register',[authController::class,'formRegister']);
Route::post('/form-register',[authController::class,'register']);
//login
Route::get('/form-login',[authController::class,'formLogin']);
Route::post('/form-login',[authController::class,'login']);
//petugas
Route::get('/dashboard-petugas',[petugasController::class,'dashboardPetugas']);
//administrator
Route::get('/dashboard-administrator',[administratorController::class,'dashboardAdministrator']);