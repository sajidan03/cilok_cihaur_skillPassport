@extends('template')

@section('title')
    Keranjang Belanja
@endsection

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Cart</h2>
        <hr>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cart as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/product/' . $item->product->image) }}"
                                        style="width: 100px;height:100px" class="me-3" alt="Produk" />
                                    <div>
                                        <h6 class="mb-0">{{ $item->product->name }}</h6>
                                        <small>{{ $item->product->descriptions }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->product->price }}</td>
                            <td>
                                <input type="number" class="form-control" value="{{ $item->qty }}" min="1"
                                    style="width: 80px;">
                            </td>
                            <td>{{ $item->qty * $item->product->price }}</td>
                            <td>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                        @php
                            $total = $total + $item->qty * $item->product->price;
                        @endphp
                    @endforeach
                    <!-- Tambahkan item lainnya sesuai kebutuhan -->
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="/" class="btn btn-outline-secondary">Lanjut Belanja</a>
            <div>
                <h5>Total: <strong>{{ $total }}</strong></h5>
                <a href="/checkout" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
@endsection
