<?php
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// class MahasiswaController extends Controller{
//     public function index(){
//         return "Index untuk mahasiswa";
//     }
//     public function insertSql(){
//        $result = DB::insert("
//             INSERT INTO mahasiswas
//             (nim, nama_lengkap, tempat_lahir, tanggal_lahir, alamat, fakultas, jurusan)
//             VALUES
//             ('23111040','Ahmad Al - Farizi','Tegal','2005-01-01','Tegal','Informatika','Rekayasa Perangkat Lunak')
//         ");
//         dump($result);
//     }
// }

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// class MahasiswaController extends Controller{

//     public function index(){
//         return "Index untuk mahasiswa";
//     }

//     public function insertSql(){ 
//         $result = DB::table('mahasiswas')->insert([
//             'nim'           => '23111041',
//             'nama_lengkap'  => 'Ahmad Al - Farizi',
//             'tempat_lahir'  => 'Tegal',
//             'tanggal_lahir' => '2005-01-01',
//             'alamat'        => 'Tegal',
//             'fakultas'      => 'Informatika',
//             'jurusan'       => 'Rekayasa Perangkat Lunak'
//         ]);

//         dump($result);
//     }
// }

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return "Index untuk mahasiswa";
    }

    public function insertSql()
    {
        $mahasiswa = new Mahasiswa();

        $mahasiswa->nim           = '23111042';
        $mahasiswa->nama_lengkap  = 'Ahmad Al - Farizi';
        $mahasiswa->tempat_lahir  = 'Tegal';
        $mahasiswa->tanggal_lahir = '2005-01-01';
        $mahasiswa->alamat        = 'Tegal';
        $mahasiswa->fakultas      = 'Informatika';
        $mahasiswa->jurusan       = 'Rekayasa Perangkat Lunak';

        $result = $mahasiswa->save();

        dump($result);
    }
}
