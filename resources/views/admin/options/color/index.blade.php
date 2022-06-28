@extends('admin.layout.app')

@section('title', 'Цвета')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Все цвета</h1>
            <a href="{{route('admin.color.add')}}" class="btn btn-info">Добавить цвет</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Название категории</th>
                        <th scope="col">Цвет</th>
                        <th scope="col">Действие</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $category)
                        @foreach($category->colors as $color)
                            <tr>
                                <td>{{$color->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$color->name}}</td>

                                <td><a class="btn btn-success" href="{{route('admin.color.edit', $color->id)}}">Редактировать</a></td>
                                <td><a class="btn btn-danger" href="">Удалить</a></td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
