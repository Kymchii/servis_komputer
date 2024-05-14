<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="d-flex justify-content-center">Edit Data</h1>

        <form action="{{route('customers.update', $customers->id_customer)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">ID:</label>
                <input type="text" name="id_customer" id="disabledTextInput" class="form-control" value="{{old('id_customer', $customers->id_customer)}}" readonly>
            </div>

            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="username" name="nama_customer" value="{{old('nama_customer', $customers->nama_customer)}}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Alamat:</label>
                <input type="text" class="form-control" id="email" name="alamat_customer" value="{{old('alamat_customer', $customers->alamat_customer)}}">
            </div>

            <div class="mb-3">
                <label for="pwd" class="form-label">Jenis Kelamin:</label>
                <input type="text" class="form-control" id="email" name="jenis_kelamin" value="{{old('jenis_kelamin', $customers->jenis_kelamin)}}" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
            {{-- {{ $user->links() }} --}}
    </div>
</body>