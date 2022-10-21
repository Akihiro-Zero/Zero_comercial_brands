<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
        @yield('title')
    </title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/images/favicon.ico') }}">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/flexslider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/color-01.css') }}">

</head>
<body>
    <!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
        @include('includer.comercial-header')

	<!--main area-->
    <main id="main">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <div id="footer">
        <div class="wrap-footer-content footer-style-1">
            @include('includer.comercial-footer')
        </div>
    </div>
    <script src="{{ asset('frontend/js/jquery-1.12.4.minb8ff.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery-ui-1.12.4.minb8ff.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('frontend/js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('frontend/js/functions.js') }}"></script>
</body>
</html>
