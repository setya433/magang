<!DOCTYPE html>
<html>
<head>
    <title>Halaman Customer</title>
    <!-- Add Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Custom styling for a luxurious touch */
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
    <div class="container">
        <h2>Data Customer</h2>
        <a href="/barang" class="btn btn-secondary">Kembali</a>
        <a href="/transaksi" class="btn btn-secondary">Transaksi</a>
        <a href="/customer/tambahcustomer" class="btn btn-success">+ Tambah Customer Baru</a>
        <br/><br/>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Customer</th>
                    <th>Nama Customer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer as $p)
                <tr>
                    <td>{{ $p->id_customer }}</td>
                    <td>{{ $p->nama_customer }}</td>
                    <td>
                        <a href="/customer/edit/{{ $p->id_customer }}" class="btn btn-primary">Edit</a>
                        <a href="/customer/hapus/{{ $p->id_customer }}" class="btn btn-danger">Hapus</a>
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
