<<<<<<< HEAD
@extends('admin.template')
=======
@extends('template')
>>>>>>> e1ff6e8f490d6917a86d6e9fc25523bd23fcec56

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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $item)
                        <form action="/administrator/invoices/{{ Crypt::encrypt($item->no_invoice) }}" method="post">
                            @csrf
                            <tr>
                                <td>{{ $item->no_invoice }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->expired_date }}</td>
                                <td>
                                    <select name="status" id="status">
                                        <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>Belum Bayar
                                        </option>
                                        <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Sudah Bayar
                                        </option>
                                    </select>

                                <td>
                                    <img src="{{ asset('storage/invoice/' . $item->proof) }}"
                                        style="width: 100px;height:100px" class="me-3" alt="Produk" />
                                </td>
                                <td>
                                    <input type="submit" value="Ubah Status" name="ubah" class="btn btn-sm btn-warning">
                                </td>
                            </tr>
                        </form>
                    @endforeach
                    <!-- Tambahkan item lainnya sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>
@endsection
