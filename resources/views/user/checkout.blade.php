@extends('user.layout.app')

@section('title', 'Shopping Cart')

@section('content')
<h1 class="text-center mb-4">Your Shopping Cart</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(!empty($cart) && count($cart) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($cart as $item)
                @php 
                    $subtotal = $item['quantity'] * $item['price'];
                    $grandTotal += $subtotal;
                @endphp
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>
                        <input type="number" name="quantity[{{ $item['id'] }}]" value="{{ $item['quantity'] }}" min="1" class="form-control" readonly>
                    </td>
                    <td>Rp {{ number_format($item['price'], 2) }}</td>
                    <td>Rp {{ number_format($subtotal, 2) }}</td>
                    <td>
                        <form action="{{ route('user.cart.remove', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-end">Grand Total:</th>
                <th>Rp {{ number_format($grandTotal, 2) }}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>

    <div class="d-flex justify-content-between">
        <a href="{{ route('user.catalog') }}" class="btn btn-secondary">Continue Shopping</a>
        <a href="{{ route('user.checkout.process') }}" class="btn btn-success">Proceed to Checkout</a>
    </div>
@else
    <p class="text-center">Your cart is empty.</p>
@endif
@endsection
