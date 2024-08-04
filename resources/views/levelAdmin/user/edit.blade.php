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
                    <label for="level" class="form-label">Level</label>
                    <select class="form-control" name="level" id="level">
                        @foreach(['Admin', 'Customer', 'Pegawai'] as $levelOptions)
                        <option value="{{ $levelOptions }}" @if(old('level', $user->level) == $levelOptions) selected @endif>
                            {{ $levelOptions }}
                        </option>
                        @endforeach
                    </select>
                    @error('level')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection