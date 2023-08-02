<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ @$title ?: config('app.name') }}
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" role="button">
                        <i class="mr-1 fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard.index') }}" class="brand-link">
                <span class="brand-text font-weight-bold">
                    <i class="fas fa-pills ml-4 text-success mr-1"></i>
                    {{ config('app.name') }}
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                @auth
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            {{ Str::limit(auth()->user()->fullname, 25) }}
                        </a>
                    </div>
                </div>
                @endauth

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @if(!auth()->check())
                        <li class="nav-item">
                            <a href="{{ route('login') }}"
                                class="nav-link {{ @$activeMenu == 'login' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-sign-in-alt"></i>
                                <p>Login</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}"
                                class="nav-link {{ @$activeMenu == 'register' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Register</p>
                            </a>
                        </li>
                        @endif
                        @auth
                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}"
                                class="nav-link {{ @$activeMenu == 'dashboard' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}"
                                class="nav-link {{ @$activeMenu == 'user' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Kelola User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('jenis-obat.index') }}"
                                class="nav-link {{ @$activeMenu == 'jenis-obat' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Referensi Jenis Obat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('obat.index') }}"
                                class="nav-link {{ @$activeMenu == 'obat' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-pills"></i>
                                <p>Kelola Obat</p>
                            </a>
                        </li>
                        @endauth
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                {{ @$title ?: 'Title' }}
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">
                                        {{ config('app.name') }}
                                    </a></li>
                                <li class="breadcrumb-item active">
                                    {{ @$title ?: 'title' }}
                                </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="content">
                <div class="container-fluid">
                    @include('components.alert')
                    {{ $slot }}
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    
    @stack('scripts')
</body>

</html>