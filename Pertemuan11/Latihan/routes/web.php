<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 5 Route Tanpa Parameter
// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/profil-desa', function () {
//     return view('profil');
// });

// Route::get('/data-warga', function () {
//     return view('warga.index');
// });

// Route::get('/kontak', function () {
//     return view('kontak');
// });


// 3 Route Dengan Parameter
// Route::get('/warga/{id}', function ($id) {
//     return "Detail warga dengan ID: $id";
// });

// Route::get('/laporan/{tahun}', function ($tahun) {
//     return "Laporan tahun $tahun";
// });

// Route::get('/berita/{slug}', function ($slug) {
//     return "Berita dengan judul: $slug";
// });

// 3 Route Dengan Parameter Opsional
// Route::get('/login/{role?}', function ($role = 'warga') {
//     return "Login sebagai $role";
// });

// Route::get('/register/{tipe?}', function ($tipe = 'umum') {
//     return "Registrasi tipe $tipe";
// });

// Route::get('/warga/filter/{status?}', function ($status = 'aktif') {
//     return "Menampilkan warga status $status";
// });

// route untuk tugas nomor 3
// Route::get('/mahasiswa', function () {
//     $nilai = [80, 64, 30, 76, 95];
//     return view('mahasiswa', compact('nilai'));
// });

// route untuk tugas nomor 4
// Route::get('/dashboard', [DashboardController::class, 'index']);
