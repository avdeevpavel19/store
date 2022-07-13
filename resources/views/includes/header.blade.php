<header class="header">
    <div class="container">
        <a class="header-logo" href="{{route('catalog.index')}}">Маркет</a>

        <form method="get" action="{{route('search')}}" class="search">
            <input class="search-input" type="text" placeholder="Поиск товара..." name="search">
            <button class="search-btn" type="submit">Найти</button>
        </form>

        <ul class="menu">
            <a href="{{route('profile.cart')}}">
                <li class="menu-item">
                    <div class="image"><img src="{{asset('images/basket.png')}}" class="image-item" alt=""></div>
                    <a href="{{route('profile.cart')}}" class="menu-link">Корзина</a>
                </li>
            </a>

            @if(Auth::check())
                <li class="menu-item">
                    <div class="image">
                        @if(auth()->user()->avatar == null)
                            <img src="{{asset('images/default-avatar.png')}}" class="profile-info__avatar" id="is-image" alt="">
                        @else
                            <img src="{{asset('storage/' . Auth::user()->avatar)}}" class="profile-info__avatar" id="is-image" alt="">
                        @endif
                    </div>
                </li>

                <ul class="profileMenu" id="profileMenu">
                    <li>
                        <a href="{{route('profile.index')}}">
                            <div class="profile-info">
                                <img src="{{asset('images/default-avatar.png')}}" class="profile-info__avatar" id="is-image" alt="">

                                <div class="profile-info__text">
                                    <p>{{Auth::user()->email}}</p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('profile.index')}}">
                            <div class="profileMenu-item">
                                <span>Профиль</span>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.index')}}">
                            <div class="profileMenu-item">
                                <span>{{auth()->user()->isAdmin ? 'Админ панель' : null}}</span>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('logout')}}">
                            <div class="profileMenu-item">
                                <span>Выйти</span>
                            </div>
                        </a>
                    </li>
                </ul>
            @else
                <li class="menu-item"><a href="{{route('login')}}" class="login-btn">Войти</a></li>
            @endif
        </ul>
    </div>
</header>

<section class="categories">
    <div class="container">
        <ul class="category">
            @foreach(\App\Models\Category::all() as $category)
                <li class="category-item"><a class="category-link" href="{{route('catalog.productListByCategory', $category->id)}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
</section>

<script>
    let avatar = document.getElementById('is-image')
    let profileMenu = document.getElementById('profileMenu')
    avatar.addEventListener("click", function (e) {
        profileMenu.classList.add("active");
    })
</script>
