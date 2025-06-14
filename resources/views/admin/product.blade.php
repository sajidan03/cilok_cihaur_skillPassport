@extends('admin.template')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <h4>List Product</h4>
        <a href="{{ route('product-create') }}" class="btn btn-sm btn-primary">Add New</a>
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
                <th>Name Product</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Category</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ substr($item->descriptions, 0, 20) }}...</td>
                <td><img src="{{ asset('storage/product/'.$item->image) }}"
                    alt="" style="width: 100px;height:100px">
                </td>
                <td>{{ $item->category->name }}</td>
                <td>
                    <a href="{{ route('product.edit', Crypt::encrypt($item->id) ) }}" class="btn btn-sm  btn-info">Edit</a>
                    <a href="{{ route('product.delete', Crypt::encrypt($item->id) ) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin dihapus?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
