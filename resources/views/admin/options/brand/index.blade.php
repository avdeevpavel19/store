@extends('admin.layout.app')

@section('title', 'Бренды')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Все бренды</h1>
            <a href="{{route('admin.brand.add')}}" class="btn btn-info">Добавить бренд</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Название категории</th>
                        <th scope="col">Бренд</th>
                        <th scope="col">Действие</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $category)
                        @foreach($category->brands as $brand)
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$brand->name}}</td>

                                <td><a class="btn btn-success" href="{{route('admin.brand.edit', $brand->id)}}">Редактировать</a></td>
                                <td><a class="btn btn-danger" href="{{route('admin.brand.delete', $brand->id)}}">Удалить</a></td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
