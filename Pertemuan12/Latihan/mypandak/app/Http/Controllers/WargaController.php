<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Warga;
use Illuminate\Http\Request;


class WargaController extends Controller
{
    public function insertRaw()
    {
    DB::insert("
        INSERT INTO wargas (nik, nama, alamat, tanggal_lahir, status, created_at, updated_at)
        VALUES (?, ?, ?, ?, ?, NOW(), NOW())
    ", [
        '3201010001',
        'Budi Santoso',
        'Desa Pandak',
        '2000-05-10',
        'aktif'
    ]);

    return "Data berhasil ditambahkan (Raw SQL)";
    }

    public function insertQueryBuilder()
    {
    DB::table('wargas')->insert([
        'nik' => '3201010002',
        'nama' => 'Siti Aminah',
        'alamat' => 'Desa Pandak',
        'tanggal_lahir' => '1999-03-12',
        'status' => 'aktif',
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return "Data berhasil ditambahkan (Query Builder)";
    }

    public function insertEloquent()
    {
    Warga::create([
        'nik' => '3201010003',
        'nama' => 'Ahmad Fauzi',
        'alamat' => 'Desa Pandak',
        'tanggal_lahir' => '2001-08-20',
        'status' => 'aktif'
    ]);

    return "Data berhasil ditambahkan (Eloquent)";
    }
}