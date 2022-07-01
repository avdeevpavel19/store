@extends('layout.app')

@section('title', 'Подтвердите email')

@section('content')
    <h3 class="title">Вам отправлено письмо с подтверждением.Перейдите по ссылке</h3>
    <a class="sendRepeat" href="{{route('verification.send')}}">Отправить повторно</a>
@endsection

<style>
    .title {
        padding-top: 80px;
        margin: 0 auto;
        width: 1060px;
        font-size: 32px;
        font-weight: 500;
    }

    .sendRepeat {
        color: #04b;
        font-size: 16px;
        padding-top: 10px;
        margin: 0 auto;
        display: block;
        width: 165px;
    }
</style>
