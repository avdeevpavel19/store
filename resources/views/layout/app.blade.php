<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Fonts (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth/register.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/catalog/welcome.css')}}">
    <link rel="stylesheet" href="{{asset('css/catalog/show.css')}}">
    <link rel="stylesheet" href="{{asset('css/catalog/category-product.css')}}">
    <link rel="stylesheet" href="{{asset('css/catalog/review-form.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile/edit.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile/cart.css')}}">

    <link rel="stylesheet" href="{{asset('css/alert-danger.css')}}">
</head>
<body>
    @yield('content')
</body>
</html>
