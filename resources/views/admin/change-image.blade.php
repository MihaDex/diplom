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
    <h4>Изменить картинку</h4>
    <div class="row section">
        <form class="col s12" action="/admin/changeimage/{{$id}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col s12">
                    <input type="file" name="img" id="input-file-events" class="dropify" data-default-file="{{$path}}" />
                </div>
                <div class="input-field col s12">
                    <button type="submit" class="btn waves-effect waves-light right submit">Изменить <i class="mdi-content-send right"></i></button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <!-- data-tables -->
    <script type="text/javascript" src="{{asset("public/js/plugins/data-tables/js/jquery.dataTables.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("public/js/plugins/data-tables/data-tables-script.js")}}"></script>

    <!-- chartist -->

    {{--<script type="text/javascript" src="public/js/plugins/jsgrid/js/db.js")}}"></script> <!--data-->--}}
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