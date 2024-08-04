@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Data Komputer</h1>
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
            <form action="{{route('admin.komputer.update', $komputer->id_komputer)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email" class="form-label">ID</label>
                    <input type="number" class="form-control" id="id" value="{{old('id_komputer', $komputer->id_komputer)}}" name="id_komputer" readonly>
                </div>

                <div class="form-group">
                    <label for="level" class="form-label">Merk</label>
                    <select class="form-control" name="merk" id="level">
                        @foreach(['asus', 'acer', 'del', 'lain'] as $merkOptions)
                        <option value="{{ $merkOptions }}" @if(old('merk', $komputer->merk) == $merkOptions) selected @endif>
                            {{ $merkOptions }}
                        </option>
                        @endforeach
                    </select>
                    @error('merk')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="from-grop">
                    <label for="email" class="form-label">Kelengkapan</label>
                    <input type="text" class="form-control" value="{{old('kelengkapan', $komputer->kelengkapan)}}" id="email" name="kelengkapan">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection