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
                <h2 class="section-title">Tambah Data</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.pegawai.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Email</label>
                    <select class="form-control" name="id_user" id="exampleFormControlSelect1">
                        @foreach ($user as $user)
                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1" >Nama</label>
                    <input type="text" class="form-control" id="id" placeholder="Masukkan nama" name="nama_pegawai">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1" >Alamat</label>
                    <input type="text" class="form-control" id="id" placeholder="Masukkan alamat" name="alamat_pegawai">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1" >Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1" >Status</label>
                    <select class="form-control" name="status">
                        <option value="Aktif">Aktif</option>
                        <option value="Non Aktif">Non-Aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection