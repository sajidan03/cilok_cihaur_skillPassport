@extends('admin.template')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <h4>List Categories</h4>
        <form action="{{ $route }}" method="post">
            @csrf
            <div class="d-flex gap-2">
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name ?? '' }}">
                <input type="submit" class="btn btn-sm btn-primary" value="Add New Category">
            </div>
        </form>
    </div>
    <hr>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Name Category</th>
                <th>Jumlah Product</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->product->count() }}</td>
                <td>
                    <a href="{{ route('admin.category.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm  btn-info">Edit</a>
                    <a href="{{ route('admin.category.delete', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin dihapus?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
