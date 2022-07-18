@foreach($reviews as $review)
    <div class="review">
        <div class="user">
            @if($review->user->avatar == null)
                <img src="{{asset('images/default-avatar.png')}}" class="user__avatar" alt="">
            @else
                <img src="{{asset('storage/' . $review->user->avatar)}}" class="user__avatar" alt="">
            @endif

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

<style>
    .review {
        max-width: 25%;
        margin-top: 25px;
        padding: 20px;

        background: #FFFFFF;
        box-shadow: 10px 10px 10px rgba(206, 206, 206, 0.09);
        margin-bottom: 50px;
    }

    .user {
        display: flex;
        align-items: center;
    }

    .user__avatar {
        background-color: #4a4a4a;
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }

    .user__title {
        font-weight: 500;
        font-size: 18px;
        margin-left: 7px;
    }

    .review__text {
        padding: 7px 0;
    }

    .review__text p {
        font-weight: 500;
        font-size: 14px;
    }

    .review__text span {
        font-weight: 300;
        font-size: 15px;
        color: #A9A9A9;
        word-wrap: break-word
    }
</style>
