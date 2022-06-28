@extends('admin.layout.app')

@section('title', 'Редактировать свойство')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактировать свойство</h1>
            <br>
        </div>
        <form action="{{route('admin.property.edit.request', $property->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <p>Название свойства:<br><input type="text" name="name" class="form-control"></p>

            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Изменить</button>
        </form>
    </main>
@endsection
