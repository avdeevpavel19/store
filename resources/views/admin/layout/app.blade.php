<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/admin/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/bootstrap.min.css')}}">
</head>
<body>
@include('admin.includes.header')
<div class="container-fluid">
    <div class="row">
        @include('admin.includes.sidebar')
        @yield('content')
    </div>
</div>
</body>
</html>
