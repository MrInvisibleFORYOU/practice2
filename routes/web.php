<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\back\DashboardController;
use App\Http\Controllers\back\LoginController;
use App\Http\Controllers\back\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');


//login and register
Route::get('/login',[LoginController::class,'show'])->name('loginPage');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/forgetPassword',[LoginController::class,'forgetPassword'])->name('forgetPassword');
Route::get('/register',[RegisterController::class,'show'])->name('registerPage');
Route::post('/register',[RegisterController::class,'register'])->name('register');

