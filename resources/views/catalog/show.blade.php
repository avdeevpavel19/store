@extends('layout.app')

@section('title', 'Главная')

@section('content')
    @include('includes.header')

    <div class="product">
        <div class="container">
            <div class="product-item">
                <div class="product-data">
                    <h3 class="product-data__title">{{$product->title}}</h3>

                    <div class="product-info">
                        <img src="{{asset('storage/' . $product->image)}}" alt="">

                        <div class="product-description">
                            <h4>Коротко о товаре</h4>

                            <div class="product-description__item">
                                @foreach($product->properties as $isProduct)
                                    <p class="description-item__property">
                                        {{$isProduct->property->name}}
                                        :
                                        <span class="description-item__value">{{$isProduct->name}}</span>
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <form class="addCart" action="{{route('add.product.request')}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="addCart-wrapper">
                        <div class="addCart-wrapper__container">
                            <h3>{{$product->price}} ₽</h3>

                            @if(auth()->user())
                                <button type="submit" name="addCartBtn">Добавить в корзину</button>
                            @else
                                <a href="{{route('login')}}">Войдите, чтобы добавить товар в корзину</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="description-block">
                <h3>Описание</h3>
                <p>{{$product->description}}</p>
            </div>
        </div>

        <div class="is-reviews">
            <div class="is-reviews__container">
                <div class="is-reviews-header">
                    <h1 class="is-reviews-header__title">Отзывы <span>{{count($reviews)}}</span></h1>
                    @if(auth()->user())
                        <a href="{{route('review.add', $product->id)}}" class="is-reviews-header__btn">Оставить отзыв</a>
                    @endif
                </div>

                <x-review :reviews="$reviews" />
            </div>
        </div>
@endsection
