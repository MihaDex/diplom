@extends('layouts.layout')
@section('content')
    <h4 class="center">Конструктор</h4>
    <div class="row">
        <div class="col s12">
            <form name="Construct">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <select name="houses" class="icons">
                            <option value="0" disabled selected>Выберите тип дома</option>
                            <option value="1" data-icon="public/images/construktor/ekonom.jpg">Эконом</option>
                            <option value="2" data-icon="public/images/construktor/komfort.jpg">Комфорт</option>
                            <option value="3" data-icon="public/images/construktor/terem.jpg">Терем</option>
                        </select>
                        <label>Типы домов</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <select name="walls" class="icons">
                            <option value="0" disabled selected>Выберите тип материала дома</option>
                            <option value="1" data-icon="public/images/construktor/brus.jpg">Брус</option>
                            <option value="2" data-icon="public/images/construktor/brevno.jpg">Бревно</option>
                            <option value="3" data-icon="public/images/construktor/karkasno-shitovoi.jpg">Каркасно-щитовой</option>
                        </select>
                        <label>Типы материалов</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <select name="roof" class="icons">
                            <option value="0" disabled selected>Выберите тип материала крыши</option>
                            <option value="1" data-icon="public/images/construktor/metallo-sherepica.jpg">Металло-черепица</option>
                            <option value="2" data-icon="public/images/construktor/miagkaia_krovla.jpg">Мягкая кровля</option>
                            <option value="3" data-icon="public/images/construktor/profnastil.jpg">Профнастил</option>
                        </select>
                        <label>Типы материалов</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6">
                        <p class="range-field">
                            <input name="square" type="range" id="test5" min="100" max="1000" />
                        </p>
                        <label>Площадь дома</label>

                    </div>
                    <div class="input-field col s2">
                        <input id="input_number" type="number" data-length="10">
                        {{--<label for="input_number">Площадь</label>--}}
                    </div>
                </div>
                <div class="row">

                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Рассчитать
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <p id="out"></p>
        </div>
    </div>
@endsection
@section('scripts')
    <script>$(document).ready(function(){
            $('select').formSelect();
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
                    $('#out').text('Вам понадобится: '+result[0]+' м. '+arr_walls[walls]+' и '+result[1]+' кв.м. '+arr_roof[roof]);
                }
            });
        });
    </script>
@endsection
