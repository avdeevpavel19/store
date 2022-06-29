@extends('admin.layout.app')

@section('title', 'Все товары')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{$category->name}}</h1>
            <a href="{{route('admin.product.add', $category->id)}}" class="btn btn-info">Добавить товар</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Стоимость</th>
                        <th scope="col">Действие</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>

                            <td><a class="btn btn-success" href="{{route('admin.product.edit', $product->id)}}">Редактировать</a></td>
                            <td><a class="btn btn-danger" href="{{route('admin.product.delete', $product->id)}}">Удалить</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
