@extends('user.layout.app')

@section('title', 'Product Catalog')

@section('content')
<h1>Product Catalog</h1>

<div class="row">
    @foreach($items as $item)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">Rp {{ number_format($item->price, 2) }}</p>
                    <p class="card-text">
                        <strong>quantity Left: </strong> 
                        <span class="{{ $item->quantity > 0 ? 'text-success' : 'text-danger' }}">
                            {{ $item->quantity }}
                        </span>
                    </p>

                    <form action="{{ route('user.cart.add', $item->id) }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="quantity-{{ $item->id }}">Quantity:</label>
                            <input type="number" id="quantity-{{ $item->id }}" name="quantity" value="1" min="1" 
                                   max="{{ $item->quantity }}" class="form-control" {{ $item->quantity == 0 ? 'disabled' : '' }}>
                        </div>
                        <button class="btn btn-primary w-100" 
                                {{ $item->quantity == 0 ? 'disabled' : '' }} 
                                style="{{ $item->quantity == 0 ? 'background-color: grey; border-color: grey;' : '' }}">
                            {{ $item->quantity > 0 ? 'Add to Cart' : 'Out of quantity' }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
