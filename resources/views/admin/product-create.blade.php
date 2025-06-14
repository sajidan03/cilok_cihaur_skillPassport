@extends('admin.template')
@section('content')
<div class="container mt-4">
    <h4>Add New Product</h4>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('product-store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name Product:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name Product" name="name" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="price" class="form-label">Price Product:</label>
            <input type="number" class="form-control" id="price" placeholder="Enter Price Product" name="price">
        </div>
        <div class="mb-3 mt-3">
            <label for="descriptions" class="form-label">Descrition Product:</label>
            <textarea name="descriptions" id="descriptions" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="image" class="form-label">Image Product:</label>
            <input type="file" class="form-control" id="image"  name="image">
        </div>
        <div class="mb-3 mt-3">
            <label for="categories_id" class="form-label">Category Product:</label>
            <select name="categories_id" id="categories_id" class="form-select">
                @foreach ($category as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 mt-3">
            <input type="submit" value="SIMPAN" class="form-control btn btn-primary">
        </div>
    </form>
</div>
@endsection
