@extends('layout.app')

@section('title', 'Моя корзина')

@section('content')
    @include('includes.header')

    @if(count($cart))
        <section class="cart">
            <div class="cart_container">
                <div class="cart-blocks">
                    <div class="cart-header">
                        <h1>Корзина</h1>
                    </div>

                    @foreach($cart as $get)
                        <div class="cart-item">
                            <div class="cart-content">
                                <div class="cart-content__left">
                                    <a href="{{route('catalog.show', $get->product->id)}}">
                                        <img class="cart-content__img"
                                             src="{{asset('storage/' . $get->product->image)}}" alt="" height="100">

                                        <div class="text">
                                            <a class="cart-content__title"
                                               href="{{route('catalog.show', $get->product->id)}}">{{$get->product->title}}</a>
                                        </div>
                                    </a>
                                </div>

                                <div class="cart-content_right">
                                    <div class="cart-item__right">
                                        <div class="price">
                                            <span>{{$get->product->price}}</span><small>₽</small>
                                        </div>

                                        <a href="{{route('profile.cart.delete', $get->id)}}" class="remove">Удалить</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="right">
                    <div class="infoOrder">
                        <div class="infoOrder-text">
                            <h3>Итого</h3>
                            <div class="total">
                                <span>1245</span>
                                <span>&thinsp;₽</span>
                            </div>
                        </div>

                        <div class="bottom">
                            <div class="bottom-text">
                                @if (count($cart) === 1)
                                    <span>Всего&nbsp;{{count($cart)}}&nbsp;товар&nbsp;</span>
                                @elseif (count($cart) < 5)
                                    <span>Всего&nbsp;{{count($cart)}}&nbsp;товара&nbsp;</span>
                                @else
                                    <span>Всего&nbsp;{{count($cart)}}&nbsp;товаров&nbsp;</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="container">
            <div class="cart-empty">
                <h2>Сложите в корзину нужные товары</h2>
                <p>А чтобы их найти, загляните в каталог</p>
                <a href="{{route('catalog.index')}}">На главную</a>
            </div>
        </div>
    @endif
@endsection
