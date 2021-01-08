<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('user/bootstraps/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('user/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('user/css/clean-blog.min.css')}}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
@include('layouts.partials.navigation')

<!-- Page Header -->
<!-- Main Content -->
@yield('content')

<hr>

<!-- Footer -->
@include('layouts.partials.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{asset('user/jquery/jquery.min.js')}}"></script>
<script src="{{asset('user/bootstraps/js/bootstrap.bundle.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{asset('user/js/clean-blog.min.js')}}"></script>
<script src="{{ mix('js/app.js') }}"></script>
@yield('scriptsAfterJs')
</body>

</html>

