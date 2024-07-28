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
                <h2 class="section-title">Tambah Data</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.barang.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan nama barang" name="nama_barang">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Merk Barang</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan merk barang" name="merk_barang">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="email" placeholder="Masukkan harga" name="harga">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="email" placeholder="Masukkan stok" name="stok">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Satuan</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan satuan" name="satuan">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection