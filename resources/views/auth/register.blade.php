@extends('layout.app')

@section('title', 'Создать аккаунт')

@section('content')
    <section class="wrapper">
        <div class="register">
            <div class="register__container">
                <h3 class="register__title">Регистрация</h3>

                <form method="POST" action="" class="registration">
                    @csrf
                    <input type="text" name="email" placeholder="Введите email">
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <input type="password" name="password" placeholder="Придумайте пароль">
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <input type="password" name="password_confirmation" placeholder="Повторите пароль">
                    @error('password_confirmation')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <button type="submit" class="registration__btn">Зарегистрироваться</button>
                    <a class="haveAccount " href="{{route('login')}}">Есть аккаунт?</a>
                </form>
            </div>
        </div>
    </section>
@endsection
