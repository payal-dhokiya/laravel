<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .sidebar {
            height: 100vh;
            padding-top: 20px;
            background-color: #f8f9fa;
            border-right: 1px solid #e5e5e5;
        }
        .sidebar a {
            color: #333;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 4px;
        }
        .sidebar a:hover {
            background-color: #ddd;
        }
        .main-content {
            padding: 20px;
        }
        .nav-link.active {
            color: #007bff;
        }
    </style>
    @yield('styles')
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 sidebar">
            <h4 class="py-2">Admin Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('user.list') ? 'active' : '' }}" href="{{ route('user.list') }}">User List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Main content -->
        <main class="col-md-10 main-content">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

