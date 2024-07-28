@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Data Keluhan</h1>
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
                <a href="{{ route('admin.keluhan.create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-primary" style="width: 2%;">No.</th>
                        <th class="table-primary" style="width: 5%;">Nama Keluhan</th>
                        <th class="table-primary">Ongkos</th>
                        <th class="table-primary" style="width: 5%;">Merk Komputer</th>
                        <th class="table-primary">Nama Customer</th>
                        <th class="table-primary">Nama Pegawai</th>
                        <th class="table-primary">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($keluhan as $index => $keluhan)
                    <tr>
                        <td class="text-center">{{ ++$index }}</td>
                        <td>{{$keluhan->nama_keluhan}}</td>
                        <td>{{$keluhan->ongkos}}</td>
                        <td>{{$keluhan->merk}}</td>
                        <td>{{$keluhan->nama_customer}}</td>
                        <td>{{$keluhan->nama_pegawai}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('admin.keluhan.destroy', $keluhan->id_keluhan)}}" method="POST">
                                <a href="{{route('admin.keluhan.show', $keluhan->id_keluhan)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('admin.keluhan.edit', $keluhan->id_keluhan)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
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