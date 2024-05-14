<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                    <h3 class="d-flex justify-content-center">Detail</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Nama: {{$customers->nama_customer}}</h5>
                <p class="card-text">Alamat: {{$customers->alamat_customer}}</p>
                <p class="card-text">Jenis Kelamin: {{$customers->jenis_kelamin}}</p>
                <a href="{{route('customers.index')}}" class="btn btn-primary">Kembali</a>
                <a href="{{route('customers.edit', $customers->id_customer)}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</body>