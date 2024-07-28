@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Data User</h1>
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
                <a href="{{ route('admin.user.create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-user-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-primary">No.</th>
                        <th class="table-primary">Username</th>
                        <th class="table-primary">Email</th>
                        <th class="table-primary">Level</th>
                        <th class="table-primary">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($user as $index => $user)
                    <tr>
                        <td class="text-center">{{ ++$index }}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->level}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('admin.user.destroy', $user->id)}}" method="POST">
                                <a href="{{route('admin.user.show', $user->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
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