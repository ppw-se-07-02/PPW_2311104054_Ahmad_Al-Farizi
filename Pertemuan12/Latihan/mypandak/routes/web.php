<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/warga/raw', [WargaController::class, 'insertRaw']);
Route::get('/warga/query', [WargaController::class, 'insertQueryBuilder']);
Route::get('/warga/eloquent', [WargaController::class, 'insertEloquent']);
