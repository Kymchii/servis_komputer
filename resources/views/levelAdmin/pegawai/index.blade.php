@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Data Pegawai</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{route('admin.admin.dashboard')}}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-start">
                <a href="{{ route('admin.pegawai.create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-primary col-1">No.</th>
                        <th class="table-primary col-2">Email</th>
                        <th class="table-primary col-1">Nama</th>
                        <th class="table-primary col-2">Alamat</th>
                        <th class="table-primary col-1">Jenis Kelamin</th>
                        <th class="table-primary col-1">Status</th>
                        <th class="table-primary col-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($pegawai as $index => $pegawai)
                    <tr>
                        <td class="text-center">{{ ++$index }}</td>
                        <td>{{$pegawai->email}}</td>
                        <td>{{$pegawai->nama_pegawai}}</td>
                        <td>{{$pegawai->alamat_pegawai}}</td>
                        <td>{{$pegawai->jenis_kelamin}}</td>
                        <td>{{$pegawai->status}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('admin.pegawai.destroy', $pegawai->id_pegawai)}}" method="POST">
                                <a href="{{route('admin.pegawai.show', $pegawai->id_pegawai)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('admin.pegawai.edit', $pegawai->id_pegawai)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-trash"></i></button>
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
        </div>
    </div>
</div>
@endsection