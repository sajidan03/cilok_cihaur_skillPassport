@extends('admin.template')
@section('content')
<div class="container mt-4">
    <h3>Dashboard</h3>
    <hr>
    <div class="d-md-flex gap-3">
        <div class="card bg bg-danger" style="width: 300px">
            <div class="card-body d-flex align-items-center justify-content-between text-white">
                <i class="fa-solid fa-gift" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h1>{{ $product->count() }}</h1>
                    <h6>Data Poduct</h6>
                </div>
            </div>
        </div>

        <div class="card bg bg-warning " style="width: 300px">
            <div class="card-body d-flex align-items-center justify-content-between text-white">
                <i class="fa-solid fa-users" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h1>{{ $member->count() }}</h1>
                    <h6>Data Member</h6>
                </div>
            </div>
        </div>

        <div class="card bg bg-info" style="width: 300px">
            <div class="card-body d-flex align-items-center justify-content-between  text-white">
                <i class="fa-solid fa-filter" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h1>{{ $category->count() }}</h1>
                    <h6>Data Category</h6>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
