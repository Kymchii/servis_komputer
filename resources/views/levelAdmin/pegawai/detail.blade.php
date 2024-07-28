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
                <h2 class="section-title">{{$pegawai->nama_pegawai}}</h2>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">Alamat: {{$pegawai->alamat_pegawai}}</p>
            <p class="card-text">Jenis Kelamin: {{$pegawai->jenis_kelamin}}</p>
            <p class="card-text">Status: {{$pegawai->status}}</p>
            <a href="{{route('admin.pegawai.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            <a href="{{route('admin.pegawai.edit', $pegawai->id_pegawai)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection