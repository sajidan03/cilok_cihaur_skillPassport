@extends('template')
@section('title')
    Produk Detail
@endsection
@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-md-5 d-flex justify-content-end">
            <img src="{{ asset('storage/product/'.$product->image) }}" style="width: 75%;height: 400px" alt="">
        </div>
        <div class="col-md-7">
            <h3>{{ $product->name }}</h3>
            <h2>Rp. {{ $product->price }}</h2>
            <ul class="nav nav-tabs mt-4">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#detail">Detail</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#spesifikasi">Spesifikasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#info">Info Penting</a>
                </li>
            </ul>

              <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane container active" id="detail">
                    <p>
                        {{ $product->descriptions }}
                    </p>
                </div>
                <div class="tab-pane container fade" id="spesifikasi">asdasd</div>
                <div class="tab-pane container fade" id="info">...</div>
            </div>
        </div>
    </div>
</div>
@endsection
