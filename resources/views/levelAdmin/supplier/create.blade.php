@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Data User</h1>
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
                <h2 class="section-title">Tambah Data</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.supplier.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Merk Barang</label>
                    <select class="form-control" name="id_barang" id="exampleFormControlSelect1">
                        @foreach ($barang as $data_barang)
                        <option value="{{ $data_barang->id_barang }}">{{ $data_barang->id_barang}}. {{ $data_barang->merk_barang }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" id="id" placeholder="Masukkan nama suppier" name="nama_supplier">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Alamat Supplier</label>
                    <input type="text" class="form-control" id="id" placeholder="Masukkan alamat suppier" name="alamat_supplier">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="id" placeholder="Masukkan no. telepon" name="telepon">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection