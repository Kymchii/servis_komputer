@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Data Keluhan</h1>
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
                <h2 class="section-title">{{$keluhan->nama_customer}}</h2>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">Keluhan: {{$keluhan->nama_keluhan}}</p>
            <p class="card-text">Merk Komputer: {{$keluhan->merk}}</p>
            <p class="card-text">Nama Pegawai: {{$keluhan->nama_pegawai}}</p>
            <p class="card-text">Ongkos: {{$keluhan->ongkos}}</p>
            <a href="{{route('admin.keluhan.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            <a href="{{route('admin.keluhan.edit', $keluhan->id_keluhan)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection