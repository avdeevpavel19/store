<header class="header">
    <div class="container">
        <a class="header-logo" href="{{route('catalog.index')}}">Маркет</a>

        <form method="get" action="{{route('search')}}" class="search">
            <input class="search-input" type="text" placeholder="Поиск товара..." name="search">
            <button class="search-btn" type="submit">Найти</button>
        </form>

        <ul class="menu">
            <li class="menu-item"><div class="image"><img src="{{asset('images/basket.png')}}" class="image-item" alt=""></div><a href="" class="menu-link">Корзина</a></li>

            @if(Auth::check())
                <li class="menu-item">
                    <div class="image">
                        @if(auth()->user()->avatar == null)
                            <img src="{{asset('images/default-avatar.png')}}" class="profile-info_avatar" id="is_image" alt="">
                        @else
                            <img src="{{asset('storage/' . Auth::user()->avatar)}}" class="profile-info_avatar" id="is_image" alt="">
                        @endif
                    </div>
                </li>

                <ul class="profileMenu" id="profileMenu">
                    <li>
                        <a href="">
                            <div class="profile-info">
                                <img src="{{asset('images/default-avatar.png')}}" class="profile-info_avatar" id="is_image" alt="">

                                <div class="profile-info_text">
                                    <p>{{Auth::user()->email}}</p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.index')}}">
                            <div class="profileMenu-item">
                                <img src="images/settings.png" alt="">
                                <span>{{auth()->user()->isAdmin ? 'Админ панель' : null}}</span>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('logout')}}">
                            <div class="profileMenu-item">
                                <img src="images/go-out.png" alt="">
                                <span>Выйти</span>
                            </div>
                        </a>
                    </li>
                </ul>
            @else
                <li class="menu-item"><div class="ima"></div><a href="{{route('login')}}" class="login_btn">Войти</a></li>
            @endif
        </ul>
    </div>
</header>

<section class="categories">
    <div class="container">
        <ul class="category">
            @foreach(\App\Models\Category::all() as $category)
                <li class="category-item"><a class="category-link" href="{{route('catalog.categoryProduct', $category->id)}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
</section>

<script>
    let avatar = document.getElementById('is_image')
    let profileMenu = document.getElementById('profileMenu')
    avatar.addEventListener("click", function(e) {
        profileMenu.classList.add("active");
    })
</script>
