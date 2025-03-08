@extends('user.layout.app')

@section('title', 'Checkout')

@section('content')
<h1 class="text-center mb-4">Checkout</h1>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(!empty($cart) && count($cart) > 0)
<form action="{{ route('user.checkout.process') }}" method="POST"> 
    @csrf

    <div class="mb-3">
        <label for="shipping_address" class="form-label">Alamat Pengiriman</label>
        <input type="text" id="shipping_address" name="shipping_address" class="form-control" required>
        @error('shipping_address') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label for="postal_code" class="form-label">Kode Pos</label>
        <input type="text" id="postal_code" name="postal_code" class="form-control" required>
        @error('postal_code') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <h3>Cart Summary</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cart as $item)
            @php
                $subtotal = $item['quantity'] * $item['price'];
                $total += $subtotal;
            @endphp
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>
                    <input type="number" name="quantity[{{ $item['id'] }}]" value="{{ $item['quantity'] }}" min="1" class="form-control" readonly>
                </td>
                <td>Rp {{ number_format($item['price'], 2) }}</td>
                <td>Rp {{ number_format($subtotal, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-end">Grand Total:</th>
                <th>Rp {{ number_format($total, 2) }}</th>
            </tr>
        </tfoot>
    </table>

    <button type="submit" class="btn btn-success w-100">Confirm Order</button>
</form>
@else
    <p class="text-center">Your cart is empty.</p>
@endif
@endsection
