@extends('layout.app')

@section('title', 'Подтвердите email')

@section('content')
    <h3 class="wrapper__title">Вам отправлено письмо с подтверждением.Перейдите по ссылке</h3>

    <a href="{{route('verification.send')}}">Отправить повторно</a>
@endsection
