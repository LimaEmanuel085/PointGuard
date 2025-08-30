<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\inputHoursController;

Route::get('/users', [userController::class, 'index']);
Route::post('/user', [userController::class, 'store']);
Route::get('/user/{id}', [userController::class, 'findUserById']);
Route::delete('/user/{id}', [userController::class, 'destroy']);
Route::put('/user/{id}', [userController::class, 'update']);

Route::get('/input-hours', [inputHoursController::class, 'index']);
