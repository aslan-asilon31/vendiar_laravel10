<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login-new', [App\Http\Controllers\Auth\LoginController::class, 'login_new'])->name('login-new');
Route::get('/register-new', [App\Http\Controllers\Auth\RegisterController::class, 'register_new'])->name('register-new');
Route::get('/forgot-password-new', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'forgot_password_new'])->name('register-new');



Route::livewire('dashboard/', 'dashboard.index')->name('dashboard.index');