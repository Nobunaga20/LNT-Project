@extends('admin.layout.app')
@section('title', 'Admin Dashboard')
@section('content')
    <h2>Welcome to the Admin Dashboard</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary p-3">
                <h4>Manage Items</h4>
                <p>View and manage all store items.</p>
                <a href="{{ route('admin.items.index') }}" class="btn btn-light">Go to Items</a>
            </div>
        </div>
    </div>
@endsection
