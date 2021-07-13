@extends('layouts.admin')
@section('css')
    {{--<link href="public/js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">--}}
    {{--<link href="public/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">--}}
    {{--<link href="public/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">--}}
    {{--<link href="public/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">--}}

    <link href="public/js/plugins/jsgrid/css/jsgrid.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="public/js/plugins/jsgrid/css/jsgrid-theme.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    <link href="public/css/jsgridfix.css" type="text/css" rel="stylesheet" media="screen,projection">


@endsection
@section('content')
    <div class="section">
        <!--DataTables example Row grouping-->
        <div id="row-grouping" class="section">
            <h4 class="header">Товары</h4>
            {{--<div class="row">--}}
                {{--<div class="col s12">--}}
                    {{--<table id="data-table-row-grouping" class="display" cellspacing="0" width="100%">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>ID</th>--}}
                            {{--<th>Заголовок</th>--}}
                            {{--<th>Категория</th>--}}
                            {{--<th>Описание</th>--}}
                            {{--<th>Цена</th>--}}
                            {{--<th>Картинка</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}

                        {{--<tfoot>--}}
                        {{--<tr>--}}
                            {{--<th>ID</th>--}}
                            {{--<th>Заголовок</th>--}}
                            {{--<th>Категория</th>--}}
                            {{--<th>Описание</th>--}}
                            {{--<th>Цена</th>--}}
                            {{--<th>Картинка</th>--}}
                        {{--</tr>--}}
                        {{--</tfoot>--}}

                        {{--<tbody>--}}
                        {{--@foreach($products as $product)--}}
                            {{--<tr>--}}
                            {{--<td>{{$product->id}}</td>--}}
                            {{--<td>{{$product->title}}</td>--}}
                            {{--<td>{{$categories[$product->categorie_id]->name}}</td>--}}
                            {{--<td>{{$product->description}}</td>--}}
                            {{--<td>{{$product->price}}</td>--}}
                            {{--<td>{{$product->image}}</td>--}}
                        {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="row">
                <div class="col s12">
                    <div id="jsGrid"></div>
                </div>
            </div>
        </div>



    </div>


@endsection
@section('scripts')
    <!-- data-tables -->
    {{--<script type="text/javascript" src="public/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>--}}
    {{--<script type="text/javascript" src="public/js/plugins/data-tables/data-tables-script.js"></script>--}}

    <!-- chartist -->

    <script type="text/javascript" src="public/js/plugins/jsgrid/js/jsgrid.min.js"></script>
    <script type="text/javascript" src="public/js/jsgridscript.js"></script>

    {{--</script>--}}
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="public/js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="public/js/custom-script.js"></script>

    <script type="text/javascript">
        /*Show entries on click hide*/
        $(document).ready(function(){
            $(".dropdown-content.select-dropdown li").on( "click", function() {
                var that = this;
                setTimeout(function(){
                    if($(that).parent().hasClass('active')){
                        $(that).parent().removeClass('active');
                        $(that).parent().hide();
                    }
                },100);
            });
        });
    </script>
@endsection