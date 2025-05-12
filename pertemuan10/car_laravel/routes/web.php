<?php
 
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

// Pastikan sudah mendefinisikan resource route di sini
Route::resource('car', CarController::class);
Route::get('/car/create', [CarController::class, 'create'])->name('car.create');

