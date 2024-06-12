@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
{{--        <!-- Sidebar -->--}}
{{--        <nav class="col-md-2 sidebar">--}}
{{--            <h4 class="py-2">Admin Dashboard</h4>--}}
{{--            <ul class="nav flex-column">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" href="{{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" {{ Request::routeIs('user.list') ? 'active' : '' }}" href="{{ route('user.list') }}">User List</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Settings</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </nav>--}}

        <!-- Main content -->
        <main class="col-md-10 main-content">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Welcome, Admin!</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Settings</button>
                    </div>
                </div>
            </div>

            <!-- Dashboard content -->
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                User Statistics
                            </div>
                            <div class="card-body">
                                <p class="card-text">Some statistics about the users...</p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Recent Activity
                            </div>
                            <div class="card-body">
                                <p class="card-text">Details of recent activities...</p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Notifications
                            </div>
                            <div class="card-body">
                                <p class="card-text">List of notifications...</p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
