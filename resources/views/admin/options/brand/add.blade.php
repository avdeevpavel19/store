@extends('admin.layout.app')

@section('title', 'Добавить бренд')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Добавить бренд</h1>
            <br>
        </div>

        <form action="{{route('admin.brand.add.request')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <p>Выберите категорию:<br>
                <select name="category" class="form-control" multiple>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </p>

            <p>Название бренда:<br><input type="text" name="name" class="form-control" placeholder="Например: Apple"></p>

            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Добавить</button>
        </form>
    </main>
@endsection
