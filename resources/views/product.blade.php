@extends('layouts.layout')
@section('content')

    <!-- Product Thumbnail Start -->
    <div class="main-product-thumbnail ptb-100 ptb-sm-60">
        <div class="container">
            <div class="thumb-bg">
                <div class="row">
                    <!-- Main Thumbnail Image Start -->
                    <div class="col-lg-5 mb-all-40">
                        <!-- Thumbnail Large Image start -->
                        <div class="tab-content">
                            <div id="thumb1" class="tab-pane fade show active">
                                <a data-fancybox="images" href="{{$product->image}}"><img src="{{$product->image}}" alt="product-view"></a>
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                    </div>
                    <!-- Main Thumbnail Image End -->
                    <!-- Thumbnail Description Start -->
                    <div class="col-lg-7">
                        <div class="thubnail-desc fix">
                            <h3 class="product-header">{{$product->title}}</h3>
                            <div class="pro-price mtb-30">
                                <p class="d-flex align-items-center"><span class="price">{{$product->price}} ₽</span></p>
                            </div>
                            <p class="mb-20 pro-desc-details">{{$product->description}} ₽</p>
                            <div class="box-quantity d-flex hot-product2">
                                <div class="pro-actions">
                                    <div  class="actions-primary">
                                        <a class="cart-button" data-id="{{$product->id}}" href="#" title="Добавить в корзину"> В корзину</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Thumbnail Description End -->
                </div>
                <!-- Row End -->
            </div>
        </div>
        <!-- Container End -->
    </div>


@endsection