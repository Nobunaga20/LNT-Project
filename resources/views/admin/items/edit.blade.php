@extends('admin.layout.app')

@section('title', 'Edit Item')

@section('content')
    <h2>Edit Item</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $item->price }}" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity (Stocks)</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $item->quantity }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Item</button>
    </form>
@endsection
