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
        <h3 class="d-flex justify-content-center">Data Pegawai</h3>

        <div class="container mt-3">        
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="table-primary">ID</th>
                <th class="table-primary">Nama</th>
                <th class="table-primary">Alamat</th>
                <th class="table-primary">Jenis Kelamin</th>
                <th class="table-primary">Status</th>
                <th class="table-primary">Actions</th>
            </tr>
            </thead>

            <tbody>
            @forelse ($pegawai as $index => $pegawai)
            <tr>
                <td>{{$pegawai->id_pegawai}}</td>
                <td>{{$pegawai->nama_pegawai}}</td>
                <td>{{$pegawai->alamat_pegawai}}</td>
                <td>{{$pegawai->jenis_kelamin}}</td>
                <td>{{$pegawai->status}}</td>
                <td>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('pegawai.destroy', $pegawai->id_pegawai)}}" method="POST">
                    <a href="{{route('pegawai.show', $pegawai->id_pegawai)}}" class="btn btn-primary">Detail</a>
                    <a href="{{route('pegawai.edit', $pegawai->id_pegawai)}}" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-primary">Hapus</button>
                </form>
                </td>
            </tr>
            @empty
            <div class="alert alert-info">
                <strong>Data belum ada</strong>
            </div>
            @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
        <a href="{{route('pegawai.create')}}" class="btn btn-md btn-primary mb-3">Tambah</a>
        </div>
        {{-- {{ $user->links() }} --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>