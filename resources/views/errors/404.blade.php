@extends('layouts.layout')
@section('content')
    <div class="error404-area ptb-100 ptb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-wrapper text-center">
                        <div class="error-text">
                            <h1>404</h1>
                            <h2>Страница не найдена!</h2>
                            <h3>{{ $exception->getMessage() }}</h3>
                            <p>Извините, но страница, которую вы ищете, не существует, была удалена, имя изменено или временно недоступна.</p>
                        </div>
                        <div class="error-button">
                            <a href="/">Назад на главную</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection