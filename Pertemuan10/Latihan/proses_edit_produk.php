<?php
include "koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$kategori = $_POST['kategori'];
$gambar = $_POST['gambar'];

$query = "UPDATE produk SET
            nama='$nama',
            harga='$harga',
            stok='$stok',
            kategori='$kategori',
            gambar='$gambar'
          WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Produk berhasil diupdate!'); window.location='tampil_produk.php';</script>";
} else {
    echo "<script>alert('Gagal update!'); window.location='form_edit_produk.php?id=$id';</script>";
}
?>
