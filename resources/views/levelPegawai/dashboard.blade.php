@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a class="nav-item" href="{{url('/pegawai/keluhan')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-thumbtack"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Keluhan</h4>
                    </div>
                    <div class="card-body">
                        {{$count}}
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection