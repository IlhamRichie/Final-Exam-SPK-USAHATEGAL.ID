<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Cetak @yield('title')</title>

    <link rel="icon" href="{{ asset('images/UsahaTegalPHB.ico') }}">
    <style>
        * {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        h1,
        h2 {
            font-weight: normal;
            padding: 0;
            margin: 0 0 10px 0;
            text-align: center;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table td,
        .table th {
            border: 1px solid black;
            padding: 5px;
        }

        .content {
            max-width: 1024px;
            margin: 0 auto;
        }
    </style>
</head>

<body onload="window.print()">

    <section class="content">
        <h1>@yield('title')</h1>
        @yield('content')
    </section>

</body>

</html>