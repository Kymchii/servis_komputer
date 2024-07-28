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
                <h2 class="section-title">Edit Data</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.customers.update', $customers->id_customer)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="disabledTextInput" class="form-label">ID</label>
                    <input type="text" name="id_customer" id="disabledTextInput" class="form-control" value="{{old('id_customer', $customers->id_customer)}}" readonly>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="username" name="nama_customer" value="{{old('nama_customer', $customers->nama_customer)}}">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="email" name="alamat_customer" value="{{old('alamat_customer', $customers->alamat_customer)}}">
                </div>

                <div class="from-group">
                    <label for="pwd" class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="email" name="jenis_kelamin" value="{{old('jenis_kelamin', $customers->jenis_kelamin)}}" readonly>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection