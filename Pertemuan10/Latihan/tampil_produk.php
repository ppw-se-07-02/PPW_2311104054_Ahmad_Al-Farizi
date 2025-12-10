<?php include "koneksi.php"; include "proses_cari_produk.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kelola Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

<h2 class="mb-3">Kelola Produk</h2>

<a href="form_tambah_produk.php" class="btn btn-success mb-3">Tambah Produk</a>

<form class="d-flex mb-3" method="GET">
    <input type="text" name="keyword" class="form-control" placeholder="Cari produk..."
           value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
    <button class="btn btn-primary ms-2">Cari</button>
</form>

<?php
if (isset($_GET['keyword']) && $_GET['keyword'] != "") {
    $keyword = $_GET['keyword'];
    $result = cariProduk($conn, $keyword);
    echo "<p>Ditemukan " . mysqli_num_rows($result) . " produk.</p>";
} else {
    $result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
}
?>

<table class="table table-bordered table-striped">
    <tr class="table-dark">
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Kategori</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>

<?php
if (mysqli_num_rows($result) > 0) {
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>$no</td>
                <td>{$row['nama']}</td>
                <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                <td>{$row['stok']}</td>
                <td>{$row['kategori']}</td>
                <td><img src='{$row['gambar']}' width='70'></td>
                <td>
                    <a href='form_edit_produk.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>
                    <a href='proses_hapus_produk.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Hapus produk?')\">Hapus</a>
                </td>
              </tr>";
        $no++;
    }
} else {
    echo "<tr><td colspan='7' class='text-center'>Tidak ada data</td></tr>";
}
?>
</table>

</body>
</html>
