<!DOCTYPE html>
<html>

<head>
    <title>Halaman Barang</title>
    <!-- Add Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Custom styling for a cleaner look */
        body {
            background-color: #f9f9f9;
        }
        .container {
            margin-top: 20px;
        }
        .table {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #6c757d; /* A muted gray for buttons */
            color: #fff;
        }
        .btn:hover {
            background-color: #5a6268; /* Darker gray on hover */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Data Barang</h2>
        <a href="/customer" class="btn btn-secondary">Ke Table Customer</a>
        <a href="/transaksi" class="btn btn-secondary">Transaksi</a>
        <a href="/barang/tambahbarang" class="btn btn-success">+ Tambah Barang Baru</a>
        <br/><br/>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $p)
                <tr>
                    <td>{{ $p->id_barang }}</td>
                    <td>{{ $p->nama_barang }}</td>
                    <td>{{ $p->harga }}</td>
                    <td>{{ $p->stok }}</td>
                    <td>
                        <a href="/barang/edit/{{ $p->id_barang }}" class="btn btn-primary">Edit</a>
                        <a href="/barang/hapus/{{ $p->id_barang }}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap JavaScript and Popper.js via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
