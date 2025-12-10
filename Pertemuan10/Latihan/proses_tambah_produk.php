<?php
include "koneksi.php";

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$kategori = $_POST['kategori'];
$gambar = $_POST['gambar'];

$query = "INSERT INTO produk (nama, harga, stok, kategori, gambar)
          VALUES ('$nama', '$harga', '$stok', '$kategori', '$gambar')";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Produk berhasil ditambahkan!'); window.location='tampil_produk.php';</script>";
} else {
    echo "<script>alert('Gagal menambah produk!'); window.location='form_tambah_produk.php';</script>";
}
?>
