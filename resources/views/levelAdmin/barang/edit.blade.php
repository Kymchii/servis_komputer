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
                <h2 class="section-title">Edit Data</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.barang.update', $barang->id_barang)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="username" value="{{old('nama_barang', $barang->nama_barang)}}" name="nama_barang">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Merk Barang</label>
                    <input type="text" class="form-control" id="email" value="{{old('merk_barang', $barang->merk_barang)}}" name="merk_barang">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="email" value="{{old('harga', $barang->harga)}}" name="harga">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="email" value="{{old('stok', $barang->stok)}}" name="stok">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Satuan</label>
                    <input type="text" class="form-control" id="email" value="{{old('satuan', $barang->satuan)}}" name="satuan">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection