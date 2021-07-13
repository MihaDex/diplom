@extends('layouts.admin')
@section('css')
    <link href="{{asset("public/js/plugins/prism/prism.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset("public/js/plugins/perfect-scrollbar/perfect-scrollbar.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset("public/js/plugins/data-tables/css/jquery.dataTables.min.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset("public/js/plugins/chartist-js/chartist.min.css")}}" type="text/css" rel="stylesheet" media="screen,projection">

    <link href="{{asset("public/js/plugins/jsgrid/css/jsgrid.min.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset("public/js/plugins/jsgrid/css/jsgrid-theme.min.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset("public/js/plugins/dropify/css/dropify.min.css")}}" type="text/css" rel="stylesheet" media="screen,projection">


@endsection
@section('content')
    <div id="borderless-table">
        <h4 class="header">Заказанные товары</h4>
        <div class="row">
            <div class="col s12 m8 l9">
                <table>
                    <thead>
                    <tr>
                        <th data-field="id">id</th>
                        <th data-field="name">Название</th>
                        <th data-field="price">Цена</th>
                        <th data-field="price">Количество</th>
                        <th data-field="price">Сумма</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?$summ=0;?>
                    @foreach($products as $product)
                        <?$summ += $product['price']*$product['count'];?>
                        <tr>
                        <td>{{$product['id']}}</td>
                        <td>{{$product['title']}}</td>
                        <td> {{$product['price']}}</td>
                            <td> {{$product['count']}}</td>
                            <td> {{$product['price']*$product['count']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="borderless-table">
        <h4 class="header">Подробности заказа</h4>
        <div class="row">
            <div class="col s12 m8 l9">
                <table>
                    <thead>
                    <tr>
                        <th data-field="id">Email</th>
                        <th data-field="name">Телефон</th>
                        <th data-field="price">Примечание</th>
                        <th data-field="price">Сумма</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> {{$order[0]->email}}</td>
                        <td>{{$order[0]->phone}}</td>
                        <td>{{$order[0]->comment}}</td>
                        <td>{{$summ}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <!-- data-tables -->
    <script type="text/javascript" src="{{asset("public/js/plugins/data-tables/js/jquery.dataTables.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("public/js/plugins/data-tables/data-tables-script.js")}}"></script>

    <!-- chartist -->

    <script type="text/javascript" src="public/js/plugins/jsgrid/js/db.js")}}></script> <!--data-->
    <script type="text/javascript" src="{{asset("public/js/plugins/jsgrid/js/jsgrid.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("public/js/jsgridscript.js")}}"></script>

    <script type="text/javascript" src="{{asset("public/js/plugins.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("public/js/plugins/dropify/js/dropify.min.js")}}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{asset("public/js/custom-script.js")}}"></script>
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
    <script type="text/javascript">
        $(document).ready(function(){

            $('.dropify').dropify({
                messages: {
                    default: 'Перетащите файл или нажмите здесь',
                    replace: 'Перетащите файл или нажмите, чтобы заменить',
                    remove:  'Удалить',
                    error:   'К сожалению, файл слишком велик'
                }
            });

            // Used events
            var drEvent = $('.dropify').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
                return confirm("Вы действительно хотите удалить \"" + element.filename + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                alert('Файл удален');
            });
        });
    </script>
@endsection