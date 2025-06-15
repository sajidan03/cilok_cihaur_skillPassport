@extends('template')
@section('title')
    Confirm Payment
@endsection
@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <form action="/payment/{{ Crypt::encrypt($invoice->no_invoice) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card shadow-sm p-4" style="max-width: 500px; width: 200%;">
                <h5 class="mb-1">Confirm your payment</h5>
                <p class="text-muted mb-3">Quickly and secure, free transactions.</p>

                <div class="bg-light p-3 rounded mb-3">
                    <p class="fw-semibold mb-3">Details</p>
                    <div class="d-flex flex-column">
                        <span>Date Invoce: {{ date('d-m-Y', strtotime($invoice->created_at)) }}</span>
                        <span>Expired Date Invoce: {{ date('d-m-Y', strtotime($invoice->expired_date)) }}</span>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 fw-semibold">Items</div>
                        <div class="col-md-2 fw-semibold">Qty</div>
                        <div class="col-md-3 fw-semibold">Price</div>
                        <div class="col-md-3 fw-semibold">Sub Total</div>
                    </div>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($invoice->invoicedetail as $item)
                        <div class="row">
                            <div class="col-md-4">{{ $item->product->name }}</div>
                            <div class="col-md-2">{{ $item->qty }}</div>
                            <div class="col-md-3">{{ $item->price }}</div>
                            <div class="col-md-3">{{ $item->qty * $item->price }}</div>
                        </div>
                        @php
                            $total = $total + $item->qty * $item->price;
                        @endphp
                    @endforeach

                    <hr>
                    <div class="d-flex justify-content-between fw-semibold">
                        <span>Total amount</span>
                        <span>Rp. {{ $total }}</span>
                    </div>
                </div>

                <span class="mb-1">Upload Proof Payment</span>
                <input type="file" name="proof" id="proof" class="form-control">

                <div class="d-flex gap-2 mt-5">
                    <button class="btn btn-outline-secondary w-50">Cancel Payment</button>
                    <button type="submit" class="btn w-50 text-white" style="background-color: #7b6ef6;">Confirm
                        Payment</button>
                </div>
            </div>
        </form>
    </div>
@endsection
