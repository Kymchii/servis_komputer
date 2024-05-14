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
        <h3 class="d-flex justify-content-center">Data Customers</h3>

        <div class="container mt-3">        
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-primary">ID</th>
                        <th class="table-primary">Nama</th>
                        <th class="table-primary">Alamat</th>
                        <th class="table-primary">Jenis Kelamin</th>
                        <th class="table-primary">Actions</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($customers as $index => $customers)
                    <tr>
                        <td>{{$customers->id_customer}}</td>
                        <td>{{$customers->nama_customer}}</td>
                        <td>{{$customers->alamat_customer}}</td>
                        <td>{{$customers->jenis_kelamin}}</td>
                        <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('customers.destroy', $customers->id_customer)}}" method="POST">
                            <a href="{{route('customers.show', $customers->id_customer)}}" class="btn btn-primary">Detail</a>
                            <a href="{{route('customers.edit', $customers->id_customer)}}" class="btn btn-primary">Edit</a>
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
                <a href="{{route('customers.create')}}" class="btn btn-md btn-primary mb-3">Tambah</a>
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