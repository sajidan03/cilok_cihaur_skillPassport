@extends('admin.template')
@section('content')
<div class="container mt-4">
    <h4>Add New Member</h4>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.member.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name Member:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name Member" name="name" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
        </div>
        <div class="mb-3 mt-3">
            <label for="nohp" class="form-label">No Handphone:</label>
            <input type="text" class="form-control" id="nohp" placeholder="Enter Number Handphone" name="nohp" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" required>
        </div>
        {{-- <div class="mb-3 mt-3">
            <label for="foto" class="form-label">Foto Member:</label>
            <input type="file" class="form-control" id="foto"  name="foto">
        </div> --}}
        <div class="mb-3 mt-3">
            <label for="passwprd" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
        </div>
        <div class="mb-3 mt-3">
            <input type="submit" value="SIMPAN" class="form-control btn btn-primary">
        </div>
    </form>
</div>
@endsection
