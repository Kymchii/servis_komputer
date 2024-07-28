@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Data Keluhan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{route('customers.customers.dashboard')}}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-primary">No.</th>
                        <th class="table-primary">Nama Keluhan</th>
                        <th class="table-primary">Ongkos</th>
                        <th class="table-primary">Merk Komputer</th>
                        <th class="table-primary">Nama Customer</th>
                        <th class="table-primary">Nama Pegawai</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($keluhan as $index => $keluhan)
                    <tr>
                        <td class="text-center">{{ ++$index }}</td>
                        <td>{{$keluhan->nama_keluhan}}</td>
                        <td>{{$keluhan->ongkos}}</td>
                        <td>{{$keluhan->merk}}</td>
                        <td>{{$keluhan->nama_customer}}</td>
                        <td>{{$keluhan->nama_pegawai}}</td>
                    </tr>
                    @empty
                    <div class="alert alert-info">
                        <strong>Data belum ada</strong>
                    </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection