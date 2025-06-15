@extends('admin.template')
@section('content')
<div class="container mt-4">
    <h4>Edit Member</h4>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('member.update', Crypt::encrypt($member->id)) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name Member:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="nohp" class="form-label">No Handphone:</label>
            <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $member->nohp }}" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $member->address }}" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="foto" class="form-label">Foto Member:</label><br>
            @if($member->foto)
            <img src="{{ asset('storage/member/' . $member->foto) }}" alt="Foto Member" style="width: 150px; height: 200px;" class="mb-2"><br>
            @endif
            <input type="file" class="form-control" id="foto" name="foto">
        </div>
        <div class="mb-3 mt-3">
            <label for="password" class="form-label">Password (Kosongkan jika tidak ingin diubah):</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password">
        </div>
        <div class="mb-3 mt-3">
            <input type="submit" value="UPDATE" class="form-control btn btn-primary">
        </div>
    </form>
</div>
@endsection
