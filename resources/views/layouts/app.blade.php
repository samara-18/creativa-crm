<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

   <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        {{-- Authenticated user info --}}
        @auth
            <li class="nav-item">
                <span class="nav-link">{{ Auth::user()->email }}</span>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link">Logout</button>
                </form>
            </li>
        @endauth

        {{-- Language Switcher --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="langDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ strtoupper(app()->getLocale()) }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="langDropdown">
                <a class="dropdown-item" href="{{ route('locale.switch', 'en') }}">EN</a>
                <a class="dropdown-item" href="{{ route('locale.switch', 'el') }}">EL</a>
            </div>
        </li>
    </ul>
</nav>


    <!-- Main Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
            <span class="brand-text font-weight-light">Creativa CRM</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('companies.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Companies</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employees.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Employees</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="main-footer text-sm text-center">
        <strong>&copy; {{ date('Y') }} Creativa CRM.</strong> All rights reserved.
    </footer>
</div>

<!-- Scripts -->
    <!-- AdminLTE App -->

    <script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    @stack('scripts')
</body>
</html>
