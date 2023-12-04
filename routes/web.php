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

//login and register
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
});
Route::get('/login',[LoginController::class,'show'])->name('loginPage');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/forgetPassword',[LoginController::class,'forgetPassword'])->name('forgetPassword');
Route::post('/forgetPassword',[LoginController::class,'sendResetLinkEmail'])->name('forgetPasswordMail');
Route::get('password/reset/{token}', [LoginController::class,'showResetForm'])->name('password.reset');
Route::post('/password/update', [LoginController::class,'reset'])->name('password.update');
Route::get('/register',[RegisterController::class,'show'])->name('registerPage');
Route::post('/register',[RegisterController::class,'register'])->name('register');

