<?php
include "koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id=$id"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

<h2>Edit Produk</h2>

<form method="POST" action="proses_edit_produk.php">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="<?php echo $data['stok']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control" value="<?php echo $data['kategori']; ?>">
    </div>

    <div class="mb-3">
        <label>Link Gambar</label>
        <input type="text" name="gambar" class="form-control" value="<?php echo $data['gambar']; ?>">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="tampil_produk.php" class="btn btn-secondary">Batal</a>
</form>

</body>
</html>
