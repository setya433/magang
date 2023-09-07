<!DOCTYPE html>
<html>
<head>
    <title>Tambah transaksi</title>
    <!-- Add Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3>Tambah Transaksi</h3>
        <a href="/transaksi" class="btn btn-secondary">Kembali</a>
        <br/><br/>

        <form action="/transaksi/store" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="id_customer">Nama Customer</label>
                <select class="form-control" name="id_customer" required>
                    <option value="">Pilih Nama</option>
                    @foreach ($customer as $customer)
                        <option value="{{ $customer->id_customer }}">{{ $customer->nama_customer }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                <select class="form-control" name="id_barang" required>
                    <option value="">Pilih barang</option>
                    @foreach ($barang as $barang)
                        <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="qty">Jumlah</label>
                <input type="number" class="form-control" min="0" required="required" name="qty">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>

        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- Add Bootstrap JavaScript and Popper.js via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
