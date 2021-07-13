@extends('layouts.layout')
@section('content')

    <!-- Arrivals Products Area Start Here -->
    <div class="arrivals-product pb-85 pt-80 pb-sm-45">
        <div class="container">
            <div class="main-product-tab-area">
                <div class="tab-menu mb-25">
                    <div class="section-ttitle">
                        <h2>Товары</h2>
                    </div>
                </div>

                <!-- Tab Contetn Start -->
                <div class="tab-content">
                        <div class="electronics-pro-active owl-carousel">
                                @if(count($products)>0)
                                    <?$trigger=0;?>
                                    @foreach($products as $key=>$product)
                                        @if($trigger==0)
                                            <!-- Double Product Start -->
                                                <div class="double-product">
                                         @endif

                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="/product/{{$product->id}}">
                                            <img class="primary-img" src="{{$product->image}}" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="/product/{{$product->id}}">{{$product->title}}</a></h4>
                                            <p><span class="price">{{$product->price}} ₽</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a class="cart-button" data-id="{{$product->id}}" href="#" title="Добавить в корзину"> В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            <?$trigger++;?>
                            @if ($trigger==2)
                                 <?$trigger=0;?>
                                 </div>
                             @endif
                            @endforeach

                            @else
                                <h4 class="center">Нет записей</h4>
                            @endif

                        </div>
                        <!-- Arrivals Product Activation End Here -->
                    </div>
                    <!-- #fshion End Here -->
                </div>
        </div>
                <!-- Tab Content End -->
            </div>
            <!-- main-product-tab-area-->
        </div>
        <!-- Container End -->
    </div>
    <!-- Arrivals Products Area End Here -->
@endsection