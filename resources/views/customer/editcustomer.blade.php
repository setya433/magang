<!DOCTYPE html>
<html>

<head>
    <title>Edit Customer</title>
    <!-- Add Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Edit Customer</h3>
        <a href="/barang" class="btn btn-secondary">Kembali</a>
        <br/><br/>

        @foreach($customer as $p)
        <form action="/customer/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $p->id_customer }}">
            <div class="form-group">
                <label for="nama_customer">Nama Customer</label>
                <input type="text" class="form-control" required="required" name="nama_customer"
                    value="{{ $p->nama_customer }}">
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
