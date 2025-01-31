<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
/*
// Patient routes
Route::get('/appointments', [AppointmentController::class, 'index']);
Route::post('/appointments/store', [AppointmentController::class, 'store']);

// Doctor routes
Route::get('/doctor/dashboard/{id}', [DoctorController::class, 'dashboard']);
Route::post('/doctor/appointment/update', [DoctorController::class, 'update']);*/
