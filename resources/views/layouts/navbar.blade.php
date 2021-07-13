<!-- Main Header Area Start Here -->
<? $categories = \App\Categorie::all();?>
<header>
    <!-- Header Top Start Here -->
    <div class="header-top-area">
        <div class="container">
            <!-- Header Top Start -->
            <div class="header-top">
                <ul>
                    @if (Auth::guest())
                        <li><a href="#">Авторизация<i class="lnr lnr-chevron-down"></i></a>
                     @else
                        <li><a href="#">{{ Auth::user()->name }}<i class="lnr lnr-chevron-down"></i></a>
                      @endif
                            <!-- Dropdown Start -->
                        <ul class="ht-dropdown">
                            @if (Auth::guest())
                            <li><a href="/login">Войти</a></li>
                            @else
                                <li><a href="/admin">Админ-панель</a></li>
                                <li><a href="/register">Регистрация</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                @endif
                        </ul>
                        <!-- Dropdown End -->
                    </li>
                </ul>
            </div>
            <!-- Header Top End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Top End Here -->
    <!-- Header Middle Start Here -->
    <div class="header-middle ptb-15">
        <div class="container">
            <div class="row align-items-center no-gutters">
                <div class="col-lg-3 col-md-12">
                    <div class="logo mb-all-30">
                        <a href="/"><img src="/public/img/logo/LogoNew.png" alt="logo-image"></a>
                    </div>
                </div>

            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Middle End Here -->
    <!-- Header Bottom Start Here -->
    <div class="header-bottom  header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                    <span class="categorie-title">Категории товаров </span>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 ">
                    <nav class="d-none d-lg-block">
                        <ul class="header-bottom-list d-flex">
                            <li @if (Route::currentRouteName() == "Главная") class="active" @endif><a href="/">Главная</a></li>
                            <li @if (Route::currentRouteName() == "Дома") class="active" @endif><a href="/homeoffers">Дома</a></li>
                            <li @if (Route::currentRouteName() == "Корзина") class="active" @endif><a href="/cart">Корзина</a></li>
                            <li @if (Route::currentRouteName() == "О нас") class="active" @endif><a href="/about">О нас</a></li>
                        </ul>
                    </nav>
                    <div class="mobile-menu d-block d-lg-none">
                        <nav>
                            <ul>
                                <li><a href="/">Главная</a></li>
                                <li><a href="/homeoffers">Дома</a></li>
                                <li><a href="/cart">Корзина</a></li>
                                <li><a href="/about">О нас</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Bottom End Here -->
    <!-- Mobile Vertical Menu Start Here -->
    <div class="container d-block d-lg-none">
        <div class="vertical-menu mt-30">
            <span class="categorie-title mobile-categorei-menu">Категории товаров</span>
            <nav>
                <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                    <ul>
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <li><a href="/categories/{{$category->id}}">{{$category->name}}</a></li>
                            @endforeach
                        @else
                            <li><a href="#!">Нет категорий</a></li>
                        @endif
                    </ul>
                </div>
                <!-- category-menu-end -->
            </nav>
        </div>
    </div>
    <!-- Mobile Vertical Menu Start End -->
</header>
<!-- Main Header Area End Here -->

<!-- Categorie Menu & Slider Area Start Here -->
<div class="main-page-banner pb-50 off-white-bg">
    <div class="container">
        <div class="row">
            <!-- Vertical Menu Start Here -->
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <div class="vertical-menu mb-all-30">
                    <nav>
                        <ul class="vertical-menu-list">
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <li><a href="/categories/{{$category->id}}">{{$category->name}}</a></li>
                                @endforeach
                            @else
                                <li><a href="#!">Нет категорий</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Vertical Menu End Here -->
            <!-- Slider Area Start Here -->
            <div class="col-xl-9 col-lg-8 slider_box">
                <div class="slider-wrapper theme-default">
                    <!-- Slider Background  Image Start-->
                    <div id="slider" class="nivoSlider">
                        <a href="/"><img src="/public/img/slider/s1.jpg" data-thumb="/public/img/slider/s1.jpg" alt="" title="#htmlcaption" /></a>
                        <a href="/"><img src="/public/img/slider/s2.jpg" data-thumb="/public/img/slider/s2.jpg" alt="" title="#htmlcaption2" /></a>
                        <a href="/"><img src="/public/img/slider/s3.jpg" data-thumb="/public/img/slider/s3.jpg" alt="" title="#htmlcaption3" /></a>
                    </div>
                    <!-- Slider Background  Image Start-->
                </div>
            </div>
            <!-- Slider Area End Here -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Categorie Menu & Slider Area End Here -->
