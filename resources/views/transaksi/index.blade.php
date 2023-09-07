<!DOCTYPE html>
<html>

<head>
    <title>transaksi</title>
    <!-- Add Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Custom CSS for a complex and beautiful design -->
    <style>
        body {
            background-color: #f8f8f8;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #292b2c;
            color: #ffffff;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .action-links a {
            text-decoration: none;
            margin-right: 10px;
            color: #3498db;
            transition: color 0.3s;
        }

        .action-links a:hover {
            color: #2980b9;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Transaksi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/barang">Tabel Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/customer">Tabel Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/transaksi/tambahtransaksi">+ Tambah Transaksi Baru</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container mt-4">
        <h2>Data Transaksi</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Customer</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $t)
                <tr>
                    <td>{{ $t->id }}</td>
                    <td>{{ $t->nama_customer}}</td>
                    <td>{{ $t->nama_barang}}</td>
                    <td>{{ $t->harga}}</td>
                    <td>{{ $t->qty }}</td>
                    <td>{{ $t->qty * $t->harga }}</td>
                     <td>
                        <a href="/transaksi/edit/{{ $t->id }}">Edit</a>
                        |
                        <a href="#" onclick="confirmDelete({{ $t->id }})">Delete</a>
                    </td>
                </tr> @endforeach </tbody>
        </table>
        <script>
            function confirmDelete(id) {
                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    // Jika pengguna mengonfirmasi penghapusan, maka kirim permintaan penghapusan ke server
                    window.location.href = "/transaksi/hapus/" + id;
                }
            }
            </script>
            </tbody>
        </table>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
