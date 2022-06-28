@extends('layout.app')

@section('title', 'Войти')

@section('content')
    <section class="wrapper">
        <div class="login">
            <div class="login__container">
                <h3 class="login__title">Вход</h3>
                <form method="POST" action="" class="authorize">
                    @csrf
                    <input class="inputText" type="text" name="email" placeholder="Введите email">
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <input class="inputPassword" type="password" name="password" placeholder="Введите пароль">
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    @error('exception')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <button type="submit" class="authorize__btn">Войти</button>

                    <div class="authorize-links">
                        <a href="{{route('register')}}">Нет аккаунта?</a>
                        <a href="{{route('password.request')}}">Забыли пароль?</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
