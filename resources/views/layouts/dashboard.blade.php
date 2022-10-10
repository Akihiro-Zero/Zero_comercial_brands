<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- font --}}
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    {{-- css file --}}
    <link rel="stylesheet" href="{{ asset('dashboard/css/material-dashboard.css') }}">
    {{-- css bootstrap file --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> --}}
    @yield('customCSS')
    <title>
        @yield('title')
    </title>
</head>
<body>
    <div class="wrapper">
        @include('includer.dashboard-sidebar')
        <div class="main-panel">
            @include('includer.dashboard-navbar')
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('dashboard/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/material-dashboard.js') }}"></script>

</body>
</html>
