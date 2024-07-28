@extends('dashboard.appDashboard')
@section('content')
<div class="section-header">
    <h1>Data Costumer</h1>
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
                <a href="{{ route('admin.customers.create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="">No.</th>
                        <th class="">ID Cus</th>
                        <th class="">Email</th>
                        <th class="">Nama</th>
                        <th class="">Alamat</th>
                        <th class="">Jenis Kelamin</th>
                        <th class="">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($customers as $index => $customers)
                    <tr>
                        <td class="text-center">{{ ++$index }}</td>
                        <td>{{$customers->id_customer}}</td>
                        <td>{{$customers->email}}</td>
                        <td>{{$customers->nama_customer}}</td>
                        <td>{{$customers->alamat_customer}}</td>
                        <td>{{$customers->jenis_kelamin}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?')" action="{{route('admin.customers.destroy', $customers->id_customer)}}" method="POST">
                                <a href="{{route('admin.customers.show', $customers->id_customer)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('admin.customers.edit', $customers->id_customer)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
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