<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/insert-data', [MahasiswaController::class,'insertSql']);
Route::get('/select-data', [MahasiswaController::class,'selectData']);
Route::get('/update-data', [MahasiswaController::class,'updateData']);
Route::get('/delete-data', [MahasiswaController::class,'deleteData']);