<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ADMIN</title>

     <link href="{{ asset('/Arsha/img/UsahaTegalPHB.png') }}" rel="icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css')}}">

    <!-- jQuery -->
    <script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('adminlte3/dist/js/adminlte.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('adminlte3/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <script src="{{ asset('adminlte3/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(function() {
            $('select:not(.default)').select2({
                theme: 'bootstrap4',
            });
        })
    </script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block" hidden>
                    <a href="{{route('home')}}" class="nav-link">Home</a>
                </li> -->
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3" hidden>
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::user()->nama_user }} ({{ Auth::user()->level }})</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="{{ route('user.profil') }}" class="dropdown-item">Profil</a></li>
                        <li><a href="{{ route('user.password') }}" class="dropdown-item">Password</a></li>
                        <li><a href="{{ route('user.logout') }}" class="dropdown-item">Logout</a></li>
                        <!-- End Level two -->
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('home')}}" class="brand-link">
                <img src="{{ asset('images/userr.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text " style="font-size:0.8em">HALAMAN ADMIN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('images/user.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('user.profil') }}" class="d-block">{{ Auth::user()->nama_user }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline" hidden>
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item" {{ is_hidden('home') }}>
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="fa fa-home"> </i>
                                <p>
                                     Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" {{ is_hidden('user.index') }}>
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="fa fa-users"> </i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" {{ is_hidden('kriteria.index') }}>
                            <a href="{{ route('kriteria.index') }}" class="nav-link">
                                <i class="fa fa-tty"> </i>
                                <p>
                                    Kriteria
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" {{ is_hidden('crisp.index') }}>
                            <a href="{{ route('crisp.index') }}" class="nav-link">
                                <i class="fa fa-puzzle-piece"> </i>
                                <p>
                                    Nilai Kriteria
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item" {{ is_hidden('alternatif.index') }}>
                            <a href="{{ route('alternatif.index') }}" class="nav-link">
                                <i class="fa fa-laptop"> </i>
                                <p>
                                    Data Alter
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" {{ is_hidden('rel_alternatif.index') }}>
                            <a href="{{ route('rel_alternatif.index') }}" class="nav-link">
                                <i class="fas fa-laptop-house"> </i>
                                <p>
                                    Nilai Alter
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" {{ is_hidden('hitung.index') }}>
                            <a href="{{ route('hitung.index') }}" class="nav-link">
                                <i class="fa fa-industry"> </i>
                                <p>
                                    Perhitungan
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1>@yield('title')</h1>
                        </div>
                        <div class="col-sm-6" hidden>
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script type="text/javascript">
        $('.form-control').attr('autocomplete', 'off');
    </script>

</body>

</html>