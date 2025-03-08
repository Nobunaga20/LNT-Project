@extends('user.layout.app')

@section('title', 'Your Invoices')

@section('content')
<h1>Invoice History</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(count($invoices) > 0)
<table class="table table-striped">
    <thead>
        <tr>
            <th>Invoice ID</th>
            <th>Total Price</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $invoice)
        <tr>
            <td>{{ $invoice->invoice_number }}</td>
            <td>Rp {{ number_format($invoice->total_price, 2) }}</td>
            <td>{{ $invoice->created_at->format('d-m-Y') }}</td>
            <td>
                <a href="{{ route('user.invoices.show', $invoice->id) }}" class="btn btn-primary">View</a> 
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>No invoices found.</p>
@endif
@endsection
