<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/current-user', [LoginController::class, 'getUser']);
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', [UserController::class, 'getAll'])->name('index');
    Route::get('/users/{id}', [UserController::class, 'get'])->name('get');
    Route::post('/users', [UserController::class, 'create'])->name('create');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('delete');
})->middleware('auth:sanctum');
