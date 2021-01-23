<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="description" name="description">
    <meta name="google" content="notranslate" />
    <meta name="msapplication-tap-highlight" content="no">

    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}} | Home</title>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=News+Cycle&display=swap" rel="stylesheet">

@include('website.layout.css')
</head>

<body class="index-page sidebar-collapse">
<!-- Navbar -->
@include('website.layout.nav')
<!-- End Navbar -->

@yield('content')


<!--   Core JS Files   -->

@include('website.layout.js')
</body>

</html>
