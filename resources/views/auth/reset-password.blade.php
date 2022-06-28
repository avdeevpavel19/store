@extends('layout.app')

@section('title', 'Восстановление пароля')

@section('content')
    <section class="wrapper">
        <div class="register">
            <div class="register__container">
                <h3 class="register__title">Сброс пароля</h3>
                <form method="POST" action="{{route('password.update')}}" class="registration">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <input name="password" class="inputText" type="password" placeholder="Новый пароль">
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <input name="password_confirmation" class="inputText" type="password" placeholder="Повторный пароль">
                    @error('password_confirmation')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <button class="registration__btn" type="submit">Отправить</button>
                </form>
            </div>
        </div>
    </section>
@endsection
