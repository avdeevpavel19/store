@extends('layout.app')

@section('title', 'Восстановление пароля')

@section('content')
    <section class="wrapper">
        <div class="register">
            <div class="register__container">
                <h3 class="register__title">Сброс пароля</h3>
                <form method="POST" action="{{route('password.email')}}" class="registration">
                    @csrf
                    <input name="email" class="inputText" type="text" placeholder="Введите email">
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @error('exception')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <button class="registration__btn" type="submit">Отправить</button>
                </form>
            </div>
        </div>
    </section>
@endsection
