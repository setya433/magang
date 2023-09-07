<!DOCTYPE html>
<html>

<head>
    <title>Tambah Barang</title>
    <!-- Add Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Tambah Barang</h3>
        <a href="/barang" class="btn btn-secondary">Kembali</a>
        <br/><br/>

        <form action="/barang/store" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" required="required">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" min="0" name="harga" required="required">
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" min="0" name="stok" required="required">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Simpan Data</button>
        </form>
    </div>

    <!-- Add Bootstrap JavaScript and Popper.js via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
