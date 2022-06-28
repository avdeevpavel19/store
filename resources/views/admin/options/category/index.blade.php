@extends('admin.layout.app')

@section('title', 'Категории')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Все категории</h1>
            <a href="{{route('admin.category.add')}}" class="btn btn-info">Добавить категорию</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Действие</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>

                            <td><a class="btn btn-success" href="">Редактировать</a></td>
                            <td><a class="btn btn-danger" href="">Удалить</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
