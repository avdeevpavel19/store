<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            @foreach(\App\Models\Category::all() as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.products.index', $category->id)}}">
                        <span data-feather="file"></span>
                        {{$category->name}}
                    </a>
                </li>
            @endforeach

            <hr>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.categories.index')}}">
                    <span data-feather="file"></span>
                    Категории
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.properties.index')}}">
                    <span data-feather="file"></span>
                    Свойства
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.values.index')}}">
                    <span data-feather="file"></span>
                    Значения
                </a>
            </li>

            <hr>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.brands.index')}}">
                    <span data-feather="file"></span>
                    Бренд
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.colors.index')}}">
                    <span data-feather="file"></span>
                    Цвет
                </a>
            </li>

            <hr>

            <li class="nav-item">
                <a class="nav-link" href="{{route('catalog.index')}}">
                    <span data-feather="file"></span>
                    Выйти
                </a>
            </li>
        </ul>
    </div>
</nav>
