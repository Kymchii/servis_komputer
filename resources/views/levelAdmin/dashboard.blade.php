@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a class="nav-item" href="{{url('/admin/user')}}">
            <div class="card card-statistic-1">

                <div class="card-icon bg-primary">
                    <i class="fas fa-user-friends"></i>
                </div>

                <div class="card-wrap">
                    <div class="card-header">
                        <h4>User</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('users')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a class="nav-item" href="{{url('/admin/customers')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Customers</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('customers')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a class="nav-item" href="{{url('/admin/pegawai')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-address-card"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pegawai</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('pegawai')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a class="nav-item" href="{{url('/admin/komputer')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-desktop"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Komputer</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('komputer')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a class="nav-item" href="{{url('/admin/keluhan')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-thumbtack"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Keluhan</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('keluhan')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a class="nav-item" href="{{url('/admin/barang')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-microchip"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Barang</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('barang')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a class="nav-item" href="{{url('/admin/barang')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-dark">
                    <i class="fas fa-truck-moving"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Supplier</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('supplier')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection