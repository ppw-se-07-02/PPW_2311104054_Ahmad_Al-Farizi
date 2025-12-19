<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'fakultas',
        'jurusan',
        'alamat',
    ];

    public function insertData()
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = '23111040';
        $mahasiswa->nama_lengkap = 'Muhammad Al - Farizi';
        $mahasiswa->tempat_lahir = 'Tegal';
        $mahasiswa->tanggal_lahir = '2004-11-17';
        $mahasiswa->fakultas = 'Teknik';
        $mahasiswa->jurusan = 'Rekayasa Perangkat Lunak';
        $mahasiswa->alamat = 'Kab. Tegal';
        $mahasiswa->save();

        return $mahasiswa;
    }
}

