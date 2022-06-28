@extends('layout.app')

@section('title', 'Главная')

@section('content')
    @include('includes.header')

    <section class="section">
        <div class="container">
            <div class="main">
                <div class="products">
                    @foreach($products as $product)
                        <div class="product">
                            <img class="product-image" src="{{asset('storage/' . $product->image)}}" alt="">
                            <div class="product-text">
                                <h3 class="product-price">{{$product->price}}</h3>
                                <a class="product-title" href="">{{$product->title}}</a>
                            </div>
                            <button class="product-btn">В корзину</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
