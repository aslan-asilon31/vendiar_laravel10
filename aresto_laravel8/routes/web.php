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



Route::livewire('/user', 'user.index')->name('user.index');
Route::livewire('/user-create', 'user.create')->name('user.create');
Route::livewire('/user-store', 'user.store')->name('user.store');
Route::livewire('/user-edit/{id}', 'user.edit')->name('user.edit');
