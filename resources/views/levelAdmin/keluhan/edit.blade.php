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
                <h2 class="section-title">Edit Data</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.keluhan.update', $keluhan->id_keluhan)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email" class="form-label">Nama Keluhan</label>
                    <input type="text" class="form-control" id="id" value="{{old('nama_keluhan', $keluhan->nama_keluhan)}}" name="nama_keluhan">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Ongkos</label>
                    <input type="number" class="form-control" id="id" value="{{old('ongkos', $keluhan->ongkos)}}" name="ongkos">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Merk Komputer</label>
                    <select class="form-control" name="id_komputer" id="exampleFormControlSelect1">
                        @foreach ($komputer as $dt_komputer)
                        <option value="{{ $dt_komputer->id_komputer }}" @if(old('id_komputer')==$dt_komputer->id_komputer)selected
                            @elseif(!old('id_komputer') && $keluhan->id_komputer == $dt_komputer->id_komputer)selected
                            @endif
                            >{{ $dt_komputer->merk }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Customer</label>
                    <select class="form-control" name="id_customer" id="exampleFormControlSelect1">
                        @foreach ($customers as $dt_customers)
                        <option value="{{ $dt_customers->id_customer }}" @if(old('id_customer')==$dt_customers->id_customer)selected
                            @elseif(!old('id_customer') && $keluhan->id_customer == $dt_customers->id_customer)selected
                            @endif
                            >{{ $dt_customers->nama_customer }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Pegawai</label>
                    <select class="form-control" name="id_pegawai" id="exampleFormControlSelect1">
                        @foreach ($pegawai as $dt_pegawai)
                        <option value="{{ $dt_pegawai->id_pegawai }}" @if(old('id_pegawai')==$dt_pegawai->id_pegawai)selected
                            @elseif(!old('id_pegawai') && $keluhan->id_pegawai == $dt_pegawai->id_pegawai)selected
                            @endif
                            >{{ $dt_pegawai->nama_pegawai }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection