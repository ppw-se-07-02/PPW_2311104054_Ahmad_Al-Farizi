<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM produk WHERE id=$id");

echo "<script>alert('Produk berhasil dihapus!'); window.location='tampil_produk.php';</script>";
?>
