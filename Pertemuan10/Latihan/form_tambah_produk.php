<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

<h2>Tambah Produk</h2>

<form action="proses_tambah_produk.php" method="POST">
    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control">
    </div>

    <div class="mb-3">
        <label>Link Gambar</label>
        <input type="text" name="gambar" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="tampil_produk.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>
