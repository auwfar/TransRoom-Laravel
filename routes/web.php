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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

	Route::get('/room', [App\Http\Controllers\RoomController::class, 'index'])->name('room.index');
    Route::get('/room/create', [App\Http\Controllers\RoomController::class, 'create'])->name('room.create');
	Route::get('/room/edit/{id}', [App\Http\Controllers\RoomController::class, 'edit'])->name('room.edit');
	Route::get('/room/destroy/{id}', [App\Http\Controllers\RoomController::class, 'destroy'])->name('room.destroy');
	Route::post('/room/store', [App\Http\Controllers\RoomController::class, 'store'])->name('room.store');
	Route::post('/room/update/{id}', [App\Http\Controllers\RoomController::class, 'update'])->name('room.update');
});