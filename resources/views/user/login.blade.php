<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link href="{{ asset('/Arsha/img/UsahaTegalPHB.png') }}" rel="icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte3/dist/css/adminlte.min.css') }}">

    <!-- Custom styles -->
    <style>
        body {
            background-image: url('/fototempat/bglog.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.8); /* Background color for the login box */
            padding: 20px;
            border-radius: 8px;
        }

        .google-btn {
            color: #fff;
            background-color: #db4437;
            border-color: #db4437;
        }

        .google-btn:hover {
            background-color: #c53729;
            border-color: #c53729;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <!-- Add your logo image here -->
            <img src="{{ asset('/Arsha/img/UsahaTegalPHB.png') }}" alt="Logo" style="max-width: 150px;">
            <br>
            <h1 style="font-size:1em"></h1>
            <br/>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan masuk ke akun Anda</p>
                {{ show_error($errors) }}
                <form action="{{ route('login.action') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="{{ route('google.redirect') }}" class="btn btn-block btn-danger google-btn">
                        <i class="fab fa-google mr-2"></i> Masuk dengan Google
                    </a>
                </div>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte3/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte3/dist/js/adminlte.min.js') }}"></script>
    <script type="text/javascript">
        $('.form-control').attr('autocomplete', 'off');
    </script>
</body>

</html>
