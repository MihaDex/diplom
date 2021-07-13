<!-- Breadcrumb Start -->
@if (Route::currentRouteName() != "Главная" && Route::currentRouteName() != "Категории"  )
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="/">Главная</a></li>
                @if (Route::currentRouteName() == "register")
                    <li class="active"><a href="#">Регистрация</a></li>
                 @else
                    <li class="active"><a href="#">{{Route::currentRouteName()}}</a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
@endif
<!-- Breadcrumb End -->