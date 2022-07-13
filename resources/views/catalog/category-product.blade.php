@extends('layout.app')

@section('title', 'Товары')

@section('content')
    @include('includes.header')

    <section>
        <div class="container">
            <div class="main">
                <div class="category-products">
                    @foreach($productList as $product)
                        <div class="category-product">
                            <div class="category-product__container">
                                <div class="category-product__data">
                                    <div class="category-product__img">
                                        <img src="{{asset('storage/' . $product->image)}}" alt="" height="165px">
                                    </div>

                                    <div class="category-product-text">
                                        <a href="{{route('catalog.show', $product->id)}}"
                                           class="category-product-text__title">{{$product->title}}</a>

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

                                    @if(auth()->user())
                                        <form action="{{route('add.product.request')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">

                                            <button type="submit" class="addCart__btn">В корзину</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
