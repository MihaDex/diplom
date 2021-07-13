@extends('layouts.layout')
@section('content')
    <h1>Оформление покупки</h1>
    <form action="/getorder" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col s12">
                <input type="number" name="phone" class="form-control" placeholder="Номер телефона">
            </div>
            <div class="col s12">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="col s12">
                <textarea type="text" name="comment" class="form-control" placeholder="Комментарий"></textarea>
            </div>
            <div class="input-field col s12">
                <button type="submit" class="btn waves-effect waves-light right submit">Оформить</button>
            </div>
        </div>
    </form>
@endsection