@extends('admin.template')
@section('content')
<div class="container mt-4">
    <h4>Edit Product</h4>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('product.update', Crypt::encrypt($product->id)) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name Product:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name Product" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="price" class="form-label">Price Product:</label>
            <input type="number" class="form-control" id="price" placeholder="Enter Price Product" name="price" value="{{ $product->price }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="descriptions" class="form-label">Descrition Product:</label>
            <textarea name="descriptions" id="descriptions" cols="30" rows="10" class="form-control">{{ $product->descriptions }}</textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="image" class="form-label">Image Product:</label><br>
            <img src="{{ asset('storage/product/'.$product->image) }}" alt="" style="width: 150px; height: 200px;" class="mb-2">
            <input type="file" class="form-control" id="image"  name="image">
        </div>
        <div class="mb-3 mt-3">
            <label for="categories_id" class="form-label">Category Product:</label>
            <select name="categories_id" id="categories_id" class="form-select">
                @foreach ($category as $item)
                <option value="{{ $item->id }}" {{ $product->categories_id ==  $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 mt-3">
            <input type="submit" value="Update" class="form-control btn btn-primary">
        </div>
    </form>
</div>
@endsection
