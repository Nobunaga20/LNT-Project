@extends('user.layout.app')

@section('title', 'Dashboard')

@section('content')
<h1>Welcome, {{ Auth::user()->name }}!</h1>
<p>View your latest purchases and activity here.</p>
@endsection
