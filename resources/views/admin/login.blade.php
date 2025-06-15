@extends('admin.template')
@section('content')
<div class="container mt-3">
    <h2>Login Administrator</h2>

    @if(session('messages'))
    <div class="alert alert-danger">
        {{ session('messages') }}
    </div>
    @endif

    <form action="/administrator/auth" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="mb-3">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
@endsection
