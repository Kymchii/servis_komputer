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
                <h2 class="section-title">Edit Data</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.supplier.update', $supplier->id_supplier)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Merk Barang</label>
                    <select class="form-control" name="id_barang" id="exampleFormControlSelect1">
                        @foreach ($barang as $dt_barang)
                        <option value="{{ $dt_barang->id_barang }}" @if(old('id_barang')==$dt_barang->id_barang)selected
                            @elseif(!old('id_barang') && $supplier->id_barang == $dt_barang->id_barang)selected
                            @endif
                            >{{ $dt_barang->merk_barang }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" id="id" value="{{old('nama_supplier', $supplier->nama_supplier)}}" name="nama_supplier">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Alamat Supplier</label>
                    <input type="text" class="form-control" id="id" value="{{old('alamat_supplier', $supplier->alamat_supplier)}}" name="alamat_supplier">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="id" value="{{old('telepon', $supplier->telepon)}}" name="telepon">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection