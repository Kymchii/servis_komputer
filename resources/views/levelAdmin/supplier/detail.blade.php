@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Data Supplier</h1>
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
                <h2 class="section-title">{{$supplier->nama_supplier}}</h2>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">Alamat: {{$supplier->alamat_supplier}}</p>
            <p class="card-text">Telepon: {{$supplier->telepon}}</p>
            @foreach ($barang as $dt_barang)
            <p class="card-text">Merk Barang: {{$dt_barang->merk_barang}}</p>
            <p class="card-text">Stok: {{$dt_barang->stok}} {{$dt_barang->satuan}}</p>
            @endforeach
            <a href="{{route('admin.supplier.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            <a href="{{route('admin.supplier.edit', $supplier->id_supplier)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection