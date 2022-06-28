@extends('layout.app')

@section('title', 'Профиль')

@section('content')
    @include('includes.header')

    <section class="profile">
        <div class="profile-container">
            <div class="profileData">
                <div class="profileData-item">
                    @if(auth()->user()->avatar == null)
                        <img src="{{asset('images/default-avatar.png')}}" class="profileData-item__avatar" id="is_image" alt="">
                    @else
                        <img src="{{asset('storage/' . Auth::user()->avatar)}}" class="profileData-item__avatar" alt="">
                    @endif
                    <h3 class="profileData-item__userName">awesome</h3>
                </div>

                <a href="{{route('profile.edit')}}" class="changeData">Изменить данные</a>
            </div>
        </div>
    </section>
@endsection
