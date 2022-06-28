@extends('layout.app')

@section('title', 'Главная')

@section('content')
    @include('includes.header')

    <section>
        <div class="container">
            <div class="main">
                <div class="category-products">
                    @foreach($categoryProduct as $product)
                        <div class="category-product">
                            <div class="category-product__container">
                                <div class="category-product-data">
                                    <div class="category-product-img">
                                        <img src="{{asset('storage/' . $product->image)}}" alt="" height="165px">
                                    </div>

                                    <div class="category-product-text">
                                        <a href="{{route('catalog.show', $product->id)}}" class="category-product-text__title">{{$product->title}}</a>

                                        <div class="category-product-text__property">
                                            @foreach($product->properties as $isProduct)
                                                <p class="category-description-item__property">
                                                    {{$isProduct->property->name}}
                                                    :
                                                    <span class="category-description-item__value">{{$isProduct->name}}</span>
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="addCart">
                                    <a class="addCart__total">{{$product->price}}&nbsp₽ </a>
                                    <button class="addCart__btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
