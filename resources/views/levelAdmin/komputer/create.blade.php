@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Data Komputer</h1>
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
            <form action="{{route('admin.komputer.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="pwd" class="form-label">Merk</label>
                    <select class="form-control" name="merk">
                        <option value="asus">Asus</option>
                        <option value="acer">Acer</option>
                        <option value="del">Del</option>
                        <option value="lain">Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Kelengkapan</label>
                    <input type="text" class="form-control" id="email" name="kelengkapan">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection