<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="d-flex justify-content-center">Tambah Data</h1>

        <form action="{{route('pegawai.store')}}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">ID:</label>
                <input type="number" class="form-control" id="id" placeholder="Masukkan id" name="id_pegawai">
            </div>

            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="id" placeholder="Masukkan nama" name="nama_pegawai">
            </div>

            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Alamat:</label>
                <input type="text" class="form-control" id="id" placeholder="Masukkan alamat" name="alamat_pegawai">
            </div>

            <div class="mb-3">
                <label for="pwd" class="form-label">Jenis Kelamin:</label>
                <select class="form-select" name="jenis_kelamin">
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="pwd" class="form-label">Status:</label>
                <select class="form-select" name="status">
                    <option value="aktif">Aktif</option>
                    <option value="non_aktif">Non-Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
            {{-- {{ $user->links() }} --}}
    </div>
</body>