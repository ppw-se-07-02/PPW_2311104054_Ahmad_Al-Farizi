<?php
namespace App\Http\Controllers;
class PageController extends Controller
{
public function index()
{
return view('welcome');
}
public function tampil()
{
    return "Daftar Mahasiswa";
$arrMahasiswa = ["Kholifahdina","Rahmat Taufik","Nita
Fitrotunimah","Defrin Anggun Saputri"];
return view('mahasiswa')->with('mahasiswa', $arrMahasiswa);
}
}
