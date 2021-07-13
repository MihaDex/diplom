@extends('layouts.layout')
@section('content')

    <!-- Contact Email Area Start -->
    <div class="contact-area ptb-100 ptb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center mb-20">
                    <h3 class="mb-20">Создание заказа</h3>
                    <b>Пожалуйста, заполните форму и менеджер свяжется с вами в близжайшее время.</b>
                </div>
            </div>

{{--            КОНСТРУКТОР НАЧАЛО--}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h4 class="pb-2">Конструктор для рассчета количества материалов</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-5">
                            <form name="Construct">
                                <div class="form-group">
                                    <label>Типы домов</label>
                                    <select name="houses" class="form-control">
                                        <option value="0" disabled selected>Выберите тип дома</option>
                                        <option value="1" data-icon="public/img/construktor/ekonom.jpg">Эконом</option>
                                        <option value="2" data-icon="public/img/construktor/komfort.jpg">Комфорт</option>
                                        <option value="3" data-icon="public/img/construktor/terem.jpg">Терем</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Типы материалов стен</label>
                                    <select name="walls" class="form-control">
                                        <option value="0" disabled selected>Выберите тип материала дома</option>
                                        <option value="1" data-icon="public/img/construktor/brus.jpg">Брус</option>
                                        <option value="2" data-icon="public/img/construktor/brevno.jpg">Бревно</option>
                                        <option value="3" data-icon="public/img/construktor/karkasno-shitovoi.jpg">Каркасно-щитовой</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Типы материалов крыши</label>
                                    <select name="roof" class="form-control">
                                        <option value="0" disabled selected>Выберите тип материала крыши</option>
                                        <option value="1" data-icon="public/img/construktor/metallo-sherepica.jpg">Металло-черепица</option>
                                        <option value="2" data-icon="public/img/construktor/miagkaia_krovla.jpg">Мягкая кровля</option>
                                        <option value="3" data-icon="public/img/construktor/profnastil.jpg">Профнастил</option>
                                    </select>
                                </div>
                                <div class="form-group pt-5">
                                    <label>Площадь дома</label>
                                    <p class="range-field">
                                        <input name="square" type="range" id="test5" min="100" max="1000" />
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input id="input_number" type="number" data-length="10" value="500">
                                    {{--<label for="input_number">Площадь</label>--}}
                                </div>
                                <p class="form-message text-danger" id="warn_calc"></p>
                                <input class="return-customer-btn" type="submit" name="action" value="Рассчитать"/>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 text-center ">
                    <div class="row">
                        <div class="col-sm-12 mb-50">
                            <h4>Итоги рассчета</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-20">
                            <b class="" id="onefield"></b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-20">
                        <b class="mb-10" id="twofield"></b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-20">
                        <b class="mb-10" id="threefield"></b>
                        </div>
                    </div>
                </div>
            </div>
{{--            КОСТРУКТОР КОНЕЦ--}}
            <div class="row">
                <div class="col-sm-12">
                    <form id="contact-form" class="contact-form" action="/getorderhome/{{$home->id}}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="address-fname">
                                    <input class="form-control" type="text" name="name" placeholder="ФИО">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="address-email">
                                    <input class="form-control" type="text" name="phone" placeholder="Телефон">
                                </div>
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="address-email">
                                    <input class="form-control" type="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="address-email">
                                    <input class="form-control" type="text" name="calculate" placeholder="Рассчет калькулятора" id="out">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                <div class="address-textarea">
                                    <textarea name="comment" class="form-control" placeholder="Ваш комментарий"></textarea>
                                </div>
                            </div>
                                <div class="col-md">
                                    <div class="row">
                                        <div class="address-subject">
                                            <input class="form-control" type="hidden" name="type" value="{{$home->name}}">
                                        </div>
                                        <p class="form-message"></p>
                                    </div>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="send-email float-md-right align-self-end">
                        <input value="Заказать" class="return-customer-btn" type="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Email Area End -->

@endsection

@section('scripts')

    <script>$(document).ready(function(){

            // $('select').formSelect();

        });

    </script>

    <script>

        $(document).ready(function(){

            $(window.Construct.square).change(function (e) {

                $('#input_number').val(e.target.value);

            });

            $('#input_number').change(function (e) {

                $(window.Construct.square).val($('#input_number').val());

            });

            $(window.Construct).submit(function (e) {

                e.preventDefault();



                var square = window.Construct.square.value;

                houses = window.Construct.houses.value;

                walls = window.Construct.walls.value;

                roof = window.Construct.roof.value;



                var result = calc(square, houses);



                function calc(square, houses) {

                    switch (houses) {

                        case '1':

                            return [Math.round(Math.sqrt(square)*4*10), Math.round(square*1.2)];

                            break;

                        case '2':

                            return [Math.round(Math.sqrt(square)*4*20), Math.round(square*1.3)];

                            break;

                        case '3':

                            return [Math.round(Math.sqrt(square)*4*30), Math.round(square*1.4)];

                            break;

                        default:

                            return 0;

                            break;

                    }

                }



                var arr_walls = ['', 'Бруса', 'Бревна', 'Щитов'];

                arr_roof =['', 'Металло-черепицы', 'Мягкой кровли', 'Профнастила'];



                if (result != 0 && walls != 0 && houses != 0){

                    $('#warn_calc').text("");
                    $('#out').val(result[0]+' м. '+arr_walls[walls]+' и '+result[1]+' кв.м. '+arr_roof[roof]);
                    $("#onefield").text("Вам понадобится:");
                    $("#twofield").text(result[0]+' м. '+arr_walls[walls]);
                    $("#threefield").text(result[1]+' кв.м. '+arr_roof[roof]);

                } else {
                    $('#warn_calc').text('Выберите все варианты для калькуляции!');
                }

            });

        });

    </script>

@endsection

