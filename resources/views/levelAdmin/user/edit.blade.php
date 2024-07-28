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
                <h2 class="section-title">Edit Data</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.user.update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email" class="form-label">Username</label>
                    <input type="text" class="form-control" id="id" value="{{old('username', $user->username)}}" name="username">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="id" value="{{old('email', $user->email)}}" name="email" readonly>
                </div>

                <div class="form-group">
                    <label for="exampleFormSelect1">Level</label>
                    <select class="form-control" name="level">
                        <option value="{{old('level', $user->level)}}">{{old('level', $user->level)}}</option>
                        <option value="Admin">Admin</option>
                        <option value="Pegawai">Pegawai</option>
                        <option value="Customer">Customer</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection