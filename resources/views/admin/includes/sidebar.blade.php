<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            @foreach(\App\Models\Category::all() as $category)
                <li class="nav-item">
                    <a class="nav-link" href="}">
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
                <a class="nav-link" href="">
                    <span data-feather="file"></span>
                    Свойства
                </a>
            </li>

            <hr>

            <li class="nav-item">
                <a class="nav-link" href="{{route('welcome')}}">
                    <span data-feather="file"></span>
                    Выйти
                </a>
            </li>
        </ul>
    </div>
</nav>
