@extends('layouts.layout')
@section('content')
    <div class="cart-main-area wish-list ptb-100 ptb-sm-60">
        <div class="container">
            <div class="row">
                <div class="tab-menu mb-25">
                <div class="section-ttitle">
                    <h2>Заказать услугу по строительству дома</h2>
                </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- Form Start -->
                    <form action="#">
                        <!-- Table Content Start -->
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Изображение</th>
                                    <th class="product-name">Название</th>
                                    <th class="product-price">Стоимость</th>
                                    <th class="product-quantity">Описание</th>
                                    <th class="product-subtotal">Добавить в корзину</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($homes as $home)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="{{$home->img}}" alt="cart-image" /></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{$home->name}}</a></td>
                                    <td class="product-price"><span class="amount">{{$home->price}} ₽</span></td>
                                    <td class="product-name"><span>{{$home->description}}</span></td>
                                    <td class="product-add-to-cart"><a href="/getorderhome/{{$home->id}}">Заказать услугу</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Content Start -->
                    </form>
                    <!-- Form End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
@endsection