<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserAPIController;



// Route::group(['prefix' => 'v1'], function () {
    Route::get('users', [UserAPIController::class, 'listdata']);
// });

// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
// Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
// Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
// Route::post('delete-user', [UserController::class,'destroy']);
// Route::get('users-list', [UserController::class,'getdata'])->name('users.list');
// Route::get('/users-export', [UserController::class, 'export'])->name('users.export');
// Route::post('/users-import', [UserController::class, 'import'])->name('users.import');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
