<?php
namespace App\Http\Controllers; use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

    class MahasiswaController extends Controller
{
        public function insertData()
    {
        $result = DB::table('mahasiswas')->insert([
            'nim' => '23111040',
            'nama_lengkap' => 'Ahmad Al - Farizi',
            'tempat_lahir' => 'Tegal',
            'tanggal_lahir' => '2005-11-17',
            'fakultas' => 'Teknik',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Kab. Tegal'
        ]);

        dump($result);
    }
}
