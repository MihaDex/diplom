@extends('layouts.layout')@section('content')    <div class="container">        <div class="row">            <div class="col s12"><h4 class="center">Корзина</h4></div>        </div>        {{--<div class="row">--}}        {{--@if(count($products)>0)--}}        {{--@foreach($products as $product)--}}        {{--<div class="col s12 m4">--}}        {{--<div class="card">--}}        {{--<div class="card-image">--}}        {{--<img src="{{$product->image}}">--}}        {{--</div>--}}        {{--<div class="card-content">--}}        {{--<span class="card-title center">{{$product->title}}</span>--}}        {{--<p>{{$product->description}}</p>--}}        {{--<b class="red-text text-darken-3"> Цена: {{$product->price}} р.</b>--}}        {{--</div>--}}        {{--<div class="card-action">--}}        {{--<a href="#" data-id="{{$product->id}}" class="cart-button">В корзину</a>--}}        {{--</div>--}}        {{--</div>--}}        {{--</div>--}}        {{--@endforeach--}}        {{--@else--}}        {{--<h4 class="center">Нет записей</h4>--}}        {{--@endif--}}        {{--</div>--}}        <div class="row">            <div class="col-sm-12" id="jsGrid"></div>        </div>        <div class="row">            <div class="col-sm-12 pb-5"><h2>Общая сумма: <b id="total">{{Cart::subtotal()}} ₽</b></h2></div>        </div>        <div class="row">            <div class="col-ms-12">                <div class="buttons-cart">                    <a href="/resetCart">Очистить корзину </a>                    <a href="/getorder">Заказать </a>                </div>            </div>        </div>    </div>@endsection@section('css')    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />    <link rel="stylesheet" href="/public/css/jsgridfix.css">@endsection@section('scripts')    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>    <script>        //        var clients = [        //            { "Name": "Otto Clay", "Age": 25, "Country": 1, "Address": "Ap #897-1459 Quam Avenue", "Married": false },        //            { "Name": "Connor Johnston", "Age": 45, "Country": 2, "Address": "Ap #370-4647 Dis Av.", "Married": true },        //            { "Name": "Lacey Hess", "Age": 29, "Country": 3, "Address": "Ap #365-8835 Integer St.", "Married": false },        //            { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },        //            { "Name": "Ramona Benton", "Age": 32, "Country": 3, "Address": "Ap #614-689 Vehicula Street", "Married": false }        //        ];        //        //        var countries = [        //            { Name: "", Id: 0 },        //            { Name: "United States", Id: 1 },        //            { Name: "Canada", Id: 2 },        //            { Name: "United Kingdom", Id: 3 }        //        ];        $.ajax({            type: "GET",            url: "/getcategories"        }).done(function(categories) {            categories.unshift({id: "0", name: ""});            var cartPlus = function () {                alert();            };            var cartMInus = function () {                alert();            };            $("#jsGrid").jsGrid({                width: "100%",                height: "400px",                paging: true,                autoload: true,                noDataContent: "Корзина пуста",                pagerFormat: "Страницы: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",                pagePrevText: "Предыдущая",                pageNextText: "Следущая",                pageFirstText: "Первая",                pageLastText: "Последняя",                deleteConfirm: "Вы действительно хотите удалить товар?",                controller: {                    loadData: function (filter) {                        return $.ajax({                            type: "GET",                            url: "/getproducts",                            data: filter                        });                    },                    deleteItem: function(item) {                        return $.ajax({                            type: "DELETE",                            headers: {                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')                            },                            url: "/cartremove/"+item.rowId,                            data: item,                            success: function () {                                $.ajax({                                    type: "GET",                                    headers: {                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')                                    },                                    url: "/getSum",                                })                                    .done(function (data) {                                        $("#total").text(data+" ₽");                                    });                            }                        });                    }                },                fields: [                    {                        name: "image", title: "Изображение",                        itemTemplate: function (val, item) {                            var img = $("<img>").attr({"src": val, "height": "100", "class": "tableImageUpdate"});                            return img;                        },                        align: "center",                        width: 200, sorting: false, filtering: false                    },                    {name: "title", title: "Название", type: "text", align: "center", width: 100},                    {name: "price", title: "Цена", type: "number", align: "center", width: 50},                    {name: "count", title: "Количество", align: "center",  itemTemplate: function (val,item) {                            return $("<div>").html("  <div class='row'> <div class='col-sm-4'><a class='cart-button' href='cartminus/"+item.rowId+"'><i class=\"fa fa-minus\" aria-hidden=\"true\"></i></a></div><div class='col-sm-4'><span>"+val+"</span></div><div class='col-sm-4'> <a class='cart-button' href='cartplus/"+item.rowId+"'> <i class=\"fa fa-plus\" aria-hidden=\"true\"></i></a></div></div>");                        },width: 70},                    {name: "summ", title:"Сумма", align: "center", width: 50, type: "number"},                    {type: "control", modeSwitchButton: false, editButton: false}                ]            });        });    </script>@endsection