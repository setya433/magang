<!DOCTYPE html>
<html>

<head>
    <title>Tambah Customer</title>
    <!-- Add Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Tambah Customer</h3>
        <a href="/barang" class="btn btn-secondary">Kembali</a>
        <br/><br/>

        <form action="/customer/store" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nama_customer">Nama Customer</label>
                <input type="text" class="form-control" name="nama_customer" required="required">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
    </div>

    <!-- Add Bootstrap JavaScript and Popper.js via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
