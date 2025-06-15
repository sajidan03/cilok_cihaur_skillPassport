@extends('template')

@section('title')
    Invoice Belanja
@endsection

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Invoices</h2>
        <hr>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No Invoice</th>
                        <th>Date</th>
                        <th>Due Date</th>
                        <th>Status Invoice</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $item)
                        <tr>
                            <td>{{ $item->no_invoice }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->expired_date }}</td>
                            <td>
                                @if ($item->proof == '-')
                                    {{ 'Not Paid' }}
                                @else
                                    @if ($item->status == 0)
                                        {{ 'Wait for Confirmation' }}
                                    @else
                                        {{ 'Paid' }}
                                    @endif
                                @endif
                            <td>
                                <img src="{{ asset('storage/invoice/' . $item->proof) }}" style="width: 100px;height:100px"
                                    class="me-3" alt="Produk" />
                            </td>
                        </tr>
                    @endforeach
                    <!-- Tambahkan item lainnya sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>
@endsection
