@extends('admin.layout.app')

@section('title', 'Create Item')

@section('content')
    <h2>Add New Item</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.items.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="" selected disabled>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity (Stocks)</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Item</button>
    </form>
@endsection