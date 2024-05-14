<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Komputer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="d-flex justify-content-center">Data Komputer</h3>

        <div class="container mt-3">        
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="table-primary">ID</th>
                <th class="table-primary">Merk</th>
                <th class="table-primary">Kelengkapan</th>
                <th class="table-primary">Actions</th>
            </tr>
            </thead>

            <tbody>
            @forelse ($komputer as $index => $komputer)
            <tr>
                <td>{{$komputer->id_komputer}}</td>
                <td>{{$komputer->merk}}</td>
                <td>{{$komputer->kelengkapan}}</td>
                <td>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('komputer.destroy', $komputer->id_komputer)}}" method="POST">
                    <a href="{{route('komputer.show', $komputer->id_komputer)}}" class="btn btn-primary">Detail</a>
                    <a href="{{route('komputer.edit', $komputer->id_komputer)}}" class="btn btn-primary">Edit</a>
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
        <a href="{{route('komputer.create')}}" class="btn btn-md btn-primary mb-3">Tambah</a>
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