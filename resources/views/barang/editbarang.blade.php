<!DOCTYPE html>
<html>

<head>
    <title>Edit Barang</title>
    <!-- Add Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Edit Barang</h3>
        <a href="/barang" class="btn btn-secondary">Kembali</a>
        <br/><br/>

        @foreach($barang as $p)
        <form action="/barang/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $p->id_barang }}">
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" required="required" name="nama_barang"
                    value="{{ $p->nama_barang }}">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" min="0" required="required" name="harga"
                    value="{{ $p->harga }}">
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" min="0" required="required" name="stok"
                    value="{{ $p->stok }}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
        @endforeach
    </div>

    <!-- Add Bootstrap JavaScript and Popper.js via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
