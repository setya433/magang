<!DOCTYPE html>
<html>

<head>
    <title>Edit transaksi</title>
    <!-- Add Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Edit Transaksi</h3>

        <a href="/transaksi" class="btn btn-secondary">Kembali</a>

        <br><br>

        <form action="/transaksi/update" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="id_customer">Nama Customer</label>
                <select class="form-control" name="id_customer" required>
                    @foreach ($customer as $id => $nama_customer)
                        <option value="{{ $id }}" {{ $transaksiDetail->id_customer == $id ? 'selected' : '' }}>
                            {{ $nama_customer }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                <select class="form-control" name="id_barang" required>
                    @foreach ($barang as $id => $nama_barang)
                        <option value="{{ $id }}" {{ $transaksiDetail->id_barang == $id ? 'selected' : '' }}>
                            {{ $nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="qty">Jumlah</label>
                @foreach ($qty as $qty)
                    <input type="hidden" name="id" value="{{ $qty->qty }}">
                    <input type="number" class="form-control" min="0" required="required" name="qty" value="{{ $qty->qty }}">
                @endforeach
            </div>
            @foreach ($transaksi as $transaksi)
                <input type="hidden" name="id" value="{{ $transaksi->id }}">
            @endforeach
            <br>
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
