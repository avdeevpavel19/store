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

                <div class="addCart">
                    <div class="addCart-wrapper">
                        <div class="addCart-wrapper__container">
                            <h3>{{$product->price}} ₽</h3>
                            <button>Добавить в корзину</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="description-block">
                <h3>Описание</h3>
                <p>{{$product->description}}</p>
            </div>
        </div>
@endsection
