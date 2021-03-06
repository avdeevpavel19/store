@extends('admin.layout.app')

@section('title', 'Редактировать товар')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактировать товар</h1>
            <br>
        </div>
        <form action="{{route('admin.product.edit.request', $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="categoryId" value="{{$product->category->id}}">
            <p>Название товара:<br><input type="text" name="title" class="form-control" placeholder="{{$product->title}}"></p>
            @error('title')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <p>Описание товара:<br><textarea name="description" class="form-control"></textarea></p>
            @error('description')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <p>Стоимость товара:<br><input type="number" name="price" class="form-control" placeholder="{{$product->price}}"></p>
            @error('price')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <p>Бренд:<br>
                <select name="brand" class="form-control" multiple>
                    @foreach($product->category->brands as $brand)
                        <option name="value" value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </p>
            @error('brand')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <p>Цвет:<br>
                <select name="color" class="form-control" multiple>
                    @foreach($product->category->colors as $color)
                        <option name="value" value="{{$color->id}}">{{$color->name}}</option>
                    @endforeach
                </select>
            </p>
            @error('color')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            @foreach($product->category->properties as $property)
                <p>{{$property->name}}:<br>
                    <select name="properties[]" class="form-control" multiple>
                        @foreach($property->values as $value)
                            <option name="value" value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </p>
            @endforeach
            @error('properties')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <input type="file" name="image" class="form-control">
            @error('image')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Изменить</button>
        </form>
    </main>
@endsection
