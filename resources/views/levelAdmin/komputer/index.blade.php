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
                <a href="{{ route('admin.komputer.create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-primary">ID</th>
                        <th class="table-primary">Merk</th>
                        <th class="table-primary">Kelengkapan</th>
                        <th class="table-primary">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($komputer as $index => $komputer)
                    <tr>
                        <td>{{$komputer->id_komputer}}</td>
                        <td>{{$komputer->merk}}</td>
                        <td>{{$komputer->kelengkapan}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('admin.komputer.destroy', $komputer->id_komputer)}}" method="POST">
                                <a href="{{route('admin.komputer.show', $komputer->id_komputer)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('admin.komputer.edit', $komputer->id_komputer)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
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