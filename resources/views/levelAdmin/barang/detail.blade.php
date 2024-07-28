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
                <h2 class="section-title">{{$barang->merk_barang}}</h2>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">Nama Barang: {{$barang->nama_barang}}</p>
            <p class="card-text">Harga: {{$barang->harga}}</p>
            <p class="card-text">Stok: {{$barang->stok}}</p>
            <p class="card-text">Satuan: {{$barang->satuan}}</p>
            <a href="{{route('admin.barang.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            <a href="{{route('admin.barang.edit', $barang->id_barang)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection