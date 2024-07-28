@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Data Barang</h1>
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
                <a href="{{ route('admin.barang.create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-auto">No.</th>
                        <th class="col-auto">Nama Barang</th>
                        <th class="col-auto">Merk Barang</th>
                        <th class="col-auto">Harga</th>
                        <th class="col-auto">Stok</th>
                        <th class="col-auto">Satuan</th>
                        <th class="col-auto">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($barang as $index => $barang)
                    <tr>
                        <td class="text-center">{{ ++$index }}</td>
                        <td>{{$barang->nama_barang}}</td>
                        <td>{{$barang->merk_barang}}</td>
                        <td>{{$barang->harga}}</td>
                        <td>{{$barang->stok}}</td>
                        <td>{{$barang->satuan}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('admin.barang.destroy', $barang->id_barang)}}" method="POST">
                                <a href="{{route('admin.barang.show', $barang->id_barang)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('admin.barang.edit', $barang->id_barang)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
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