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
            <form action="{{route('admin.pegawai.update', $pegawai->id_pegawai)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email" class="form-label">ID</label>
                    <input type="number" class="form-control" id="id" value="{{old('id_pegawai', $pegawai->id_pegawai)}}" name="id_pegawai" readonly>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="id" value="{{old('nama_pegawai', $pegawai->nama_pegawai)}}" name="nama_pegawai">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="id" value="{{old('alamat_pegawai', $pegawai->alamat_pegawai)}}" name="alamat_pegawai">
                </div>

                <div class="form-group">
                    <label for="pwd" class="form-label">Jenis Kelamin</label>
                    <input class="form-control" name="jenis_kelamin" value="{{old('jenis_kelamin', $pegawai->jenis_kelamin)}}" readonly>
                </div>

                <div class="form-group">
                    <label for="pwd" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="{{old('status', $pegawai->status)}}">{{old('status', $pegawai->status)}}</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Non Aktif">Non-Aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection