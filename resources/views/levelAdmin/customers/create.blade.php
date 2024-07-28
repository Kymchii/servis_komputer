@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Data Customer</h1>
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
            <form action="{{route('admin.customers.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Email</label>
                    <select class="form-control" name="id_user" id="exampleFormControlSelect1">
                        @foreach ($user as $data_user)
                        <option value="{{ $data_user->id }}">{{ $data_user->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan nama anda" name="nama_customer">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan alamat anda" name="alamat_customer">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection