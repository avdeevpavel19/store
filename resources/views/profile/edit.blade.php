@extends('layout.app')

@section('title', 'Загрузить аватар')

@section('content')
    @include('includes.header')

    <section class="profile">
        <div class="container-edit-settings">
            <div class="edit-settings">
                <form action="{{route('profile.edit.request')}}" method="post" class="edit-form" enctype="multipart/form-data">
                    @csrf
                    <div class="edit-settings">
                        <div class="edit-settings__block">
                            @if(auth()->user()->avatar == null)
                                <img src="{{asset('images/default-avatar.png')}}" class="avatar" id="is-image" alt="">
                            @else
                                <img src="{{asset('storage/' . Auth::user()->avatar)}}" class="avatar" alt="">
                            @endif
                        </div>

                        <div class="settings-text">
                            <span>Это фото используется в ответах, комментариях и отзывах</span>

                            <div class="settings-text__btn">
                                <input type="file" name="uploadFile" id="img" style="display:none;"/>
                                <label for="img" class="settings-text__avatar">Загрузить новое</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="edit-form__btn">Сохранить</button>
                </form>
            </div>
        </div>
    </section>
@endsection
