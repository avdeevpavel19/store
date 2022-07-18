@extends('layout.app')

@section('title', 'Профиль')

@section('content')
    @include('includes.header')

    <section class="profile">
        <div class="profile-container">
            <div class="profileData">
                <div class="profileData-item">
                    @if(auth()->user()->avatar == null)
                        <img src="{{asset('images/default-avatar.png')}}" class="profileData-item__avatar" id="is-image" alt="">
                    @else
                        <img src="{{asset('storage/' . Auth::user()->avatar)}}" class="profileData-item__avatar" alt="">
                    @endif
                        <h3 class="profileData-item__userName">{{Auth::user()->email}}</h3>
                </div>

                <a href="{{route('profile.edit')}}" class="changeData">Изменить данные</a>
            </div>

            <div class="myReviews">
                <h3 class="myReviews__title">Мои отзывы</h3>

                <div class="reviews">
                    @foreach($user->reviews as $review)
                        <div class="profile-review">
                            <div class="profile-review-item">
                                <a href="{{route('catalog.show', $review->product->id)}}"
                                   class="profile-review-item__product">
                                    <img src="{{asset('storage/' . $review->product->image)}}" alt="" height="50">
                                    <a href="{{route('catalog.show', $review->product->id)}}" class="profile-review-item__product review-title">{{$review->product->title}}</a>
                                </a>
                            </div>

                            <div class="profile-review-block">
                                <h6 class="profile-review-block__title">Достоинства:</h6>
                                <p class="profile-review-block__text">{{$review->like}}</p>
                            </div>

                            <div class="profile-review-block">
                                <h6 class="profile-review-block__title">Недостатки:</h6>
                                <p class="profile-review-block__text">{{$review->dislike}}</p>
                            </div>

                            <div class="profile-review-block">
                                <h6 class="profile-review-block__title">Комментарий:</h6>
                                <p class="profile-review-block__text">{{$review->other_impressions}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
