<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark p-3 d-flex justify-content-between">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">Admin Dashboard</a>
        <div>
            <a href="{{ route('admin.items.index') }}" class="btn btn-light">Manage Items</a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline-block">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>