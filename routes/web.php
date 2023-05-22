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

	Route::get('/room', [App\Http\Controllers\RoomController::class, 'index'])->name('room');
    Route::get('/room/create', [App\Http\Controllers\RoomController::class, 'create'])->name('room.create');
	Route::get('/room/edit/{id}', [App\Http\Controllers\RoomController::class, 'edit'])->name('room.edit');
	Route::get('/room/destroy/{id}', [App\Http\Controllers\RoomController::class, 'destroy'])->name('room.destroy');
	Route::post('/room/store', [App\Http\Controllers\RoomController::class, 'store'])->name('room.store');
	Route::post('/room/update/{id}', [App\Http\Controllers\RoomController::class, 'update'])->name('room.update');

	Route::get('/room_type', [App\Http\Controllers\RoomTypeController::class, 'index'])->name('room_type');
    Route::get('/room_type/create', [App\Http\Controllers\RoomTypeController::class, 'create'])->name('room_type.create');
	Route::get('/room_type/edit/{id}', [App\Http\Controllers\RoomTypeController::class, 'edit'])->name('room_type.edit');
	Route::get('/room_type/destroy/{id}', [App\Http\Controllers\RoomTypeController::class, 'destroy'])->name('room_type.destroy');
	Route::post('/room_type/store', [App\Http\Controllers\RoomTypeController::class, 'store'])->name('room_type.store');
	Route::post('/room_type/update/{id}', [App\Http\Controllers\RoomTypeController::class, 'update'])->name('room_type.update');

	Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index'])->name('booking');
    Route::get('/booking/create', [App\Http\Controllers\BookingController::class, 'create'])->name('booking.create');
	Route::get('/booking/edit/{id}', [App\Http\Controllers\BookingController::class, 'edit'])->name('booking.edit');
	Route::get('/booking/destroy/{id}', [App\Http\Controllers\BookingController::class, 'destroy'])->name('booking.destroy');
	Route::post('/booking/store', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
	Route::post('/booking/update/{id}', [App\Http\Controllers\BookingController::class, 'update'])->name('booking.update');
});