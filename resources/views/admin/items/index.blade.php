@extends('admin.layout.app')
@section('title', 'Item Management')
@section('content')
    <h2>Item List</h2>
    <a href="{{ route('admin.items.create') }}" class="btn btn-primary">Add New Item</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity (Stocks)</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>
                        <a href="{{ route('admin.items.edit', $item) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.items.destroy', $item) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
