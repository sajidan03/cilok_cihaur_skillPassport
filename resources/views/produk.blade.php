@extends('template')

@section('title')
Produk
@endsection

@section('content')
<div class="container p-4 ">
    <h3>Produk Kami</h3>
    <!-- Nav pills -->
    <ul class="nav nav-pills justify-content-center">
        @foreach ($category as $key => $item)
        <li class="nav-item">
            <a class="nav-link {{ ($key==0)?'active':'' }}" data-bs-toggle="pill" href="#kategori{{ $item->id }}"> {{ $item->name }} </a>
        </li>
        @endforeach
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        @foreach ($category as $key => $item)
        <div class="tab-pane container {{ ($key==0)?'active':'' }}" id="kategori{{ $item->id }}">
            <div class="d-flex gap-3 w-100">
                @foreach ($item->product as $item)
                <div class="card" style="width:400px">
                    <img class="card-img-top" style="height: 300px" src="{{ asset('storage/product/'.$item->image) }}" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">{{ $item->name }}</h4>
                        <p class="card-text">Rp. {{ number_format($item->price, 0, ',', '.') }}</p>
                        <a href="#" class="btn btn-primary">Beli</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>




</div>
@endsection
