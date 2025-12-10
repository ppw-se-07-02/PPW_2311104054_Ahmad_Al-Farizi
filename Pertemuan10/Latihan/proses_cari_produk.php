<?php
function cariProduk($conn, $keyword) {
    $keyword = mysqli_real_escape_string($conn, $keyword);

    $query = "SELECT * FROM produk 
              WHERE nama LIKE '%$keyword%'
              OR kategori LIKE '%$keyword%'
              ORDER BY id DESC";

    return mysqli_query($conn, $query);
}
?>
