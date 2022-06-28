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

        <div class="is-reviews">
            <div class="is-reviews__container">
                <div class="is-reviews-header">
                    <h1 class="is-reviews-header__title">Отзывы <span>{{count($reviews)}}</span></h1>
                    <a href="{{route('review.add', $product->id)}}" class="is-reviews-header__btn">Оставить отзыв</a>
                </div>

                @foreach($reviews as $review)
                    <div class="review">
                        <div class="user">
                            <div class="user__avatar"></div>
                            <h4 class="user__title">{{$review->user->email}}</h4>
                        </div>

                        <div class="review__text">
                            <p>Достоинства: <span>{{$review->like}}</span></p>
                        </div>

                        <div class="review__text">
                            <p>Недостатки: <span>{{$review->dislike}}</span></p>
                        </div>

                        <div class="review__text">
                            <p>Комментарий: <span>{{$review->other_impressions}}</span></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
