@extends('layouts.layout')

@section('content')

    <div class="register-account ptb-100 ptb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="register-title">
                        <h3 class="mb-10">Регистрация</h3>
                        <p class="mb-10">Если у вас уже есть учетная запись у нас, пожалуйста, войдите в систему на странице входа. Зарегистрировать нового ползователя может только администратор.</p>
                    </div>
                </div>
            </div>
            <!-- Row End -->
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-register" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend>Персональные данные</legend>
                            <div class="form-group d-md-flex align-items-md-center{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label col-md-2" for="f-name"><span class="require">*</span>Имя</label>
                                <div class="col-md-10">
                                    <input id="f-name" placeholder="Имя" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label col-md-2" for="email"><span class="require">*</span>Email</label>
                                <div class="col-md-10">
                                    <input id="email" placeholder="Введите ваш адрес электронной почты..." type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Пароль</legend>
                            <div class="form-group d-md-flex align-items-md-center{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Пароль</label>
                                <div class="col-md-10">
                                    <input id="password" type="password" class="form-control" placeholder="Пароль" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="pwd-confirm"><span class="require">*</span>Подтвердить пароль</label>
                                <div class="col-md-10">
                                    <input id="pwd-confirm" type="password" class="form-control" placeholder="Подтвердить пароль" name="password_confirmation" required>
                                </div>
                            </div>
                        </fieldset>
                        <div class="terms">
                            <div class="float-md-right">
                                <input type="submit" value="Continue" class="return-customer-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
@endsection
