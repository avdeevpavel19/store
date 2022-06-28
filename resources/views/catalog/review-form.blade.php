@extends('layout.app')

@section('title', 'Главная')

@section('content')
    @include('includes.header')

    <section class="reviews">
        <div class="container">
            <form method="POST" action="{{route('review.add.request', $product->id)}}" class="review-container">
                @csrf
                <div class="reviews-header">
                    <h2 class="reviews-header__title">Отзыв о товаре {{$product->title}}</h2>
                    <img class="reviews-header__img" src="{{asset('storage/' . $product->image)}}" alt="">
                </div>

                <article>
                    <textarea class="textarea" name="like"  cols="30" rows="10" placeholder="Что вам понравилось"></textarea>
                    <textarea class="textarea" name="dislike"  cols="30" rows="10" placeholder="Что вам не понравилось"></textarea>
                    <textarea class="textarea" name="other_impressions"  cols="30" rows="10" placeholder="Другие впеатления"></textarea>
                </article>

                <button class="review-btn" type="submit">Оставить</button>
            </form>
        </div>
    </section>
@endsection
