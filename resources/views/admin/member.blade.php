@extends('admin.template')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <h4>List Members</h4>
        <a href="{{ route('admin.member.create') }}" class="btn btn-sm btn-primary">Add New</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Name Member</th>
                <th>Email</th>
                <th>No Hp</th>
                <th>Address</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($member as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->user->email }}</td>
                <td>{{ $item->nohp }}</td>
                <td>{{ $item->address }}</td>
                <td><img src="{{ asset('storage/member/'.$item->foto) }}" alt="" style="width: 100px;height:100px"></td>
                <td>
                    <a href="" class="btn btn-sm  btn-info">Edit</a>
                    <a href="" class="btn btn-sm btn-danger" onclick="return confirm('Yakin dihapus?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
