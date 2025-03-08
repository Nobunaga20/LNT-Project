@extends('user.layout.app')

@section('title', 'Invoice Details')

@section('content')
<h1>Faktur Pembelian</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card p-4">
    <h3>Invoice Number: {{ $invoice->invoice_number }}</h3>
    <p><strong>Tanggal:</strong> {{ $invoice->created_at->format('d-m-Y') }}</p>
    <p><strong>Alamat Pengiriman:</strong> {{ $invoice->shipping_address }}</p>
    <p><strong>Kode Pos:</strong> {{ $invoice->postal_code }}</p>
    <h4>Total Pembayaran: Rp {{ number_format($invoice->total_price, 2) }}</h4>
</div>

<h3>Detail Pembelian</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoice->invoiceItems as $item)
        <tr>
            <td>{{ $item->item->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>Rp {{ number_format($item->item->price, 2) }}</td>
            <td>Rp {{ number_format($item->subtotal, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex gap-2 mt-4">
    <button onclick="window.print()" class="btn btn-primary">Cetak Faktur</button>
    <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">Kembali ke Home</a>
</div>
@endsection
