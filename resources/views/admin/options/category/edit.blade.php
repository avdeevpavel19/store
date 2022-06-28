@extends('admin.layout.app')

@section('title', 'Редактировать категорию')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактировать категорию</h1>
            <br>
        </div>
        <form action="{{route('admin.category.edit.request', $category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <p>Название категории:<br><input type="text" name="name" class="form-control" required></p>
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Изменить</button>
        </form>
    </main>
@endsection
