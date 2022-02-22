@extends('layouts.master')

@section('content')
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>Регистрация</h1></div>
            <div class="services-inner" style="margin-top: 0;">
                <div class="tabs tabsr">
                    <ul>
                        <li>Физическое лицо</li>
                        <li>Юридическое лицо</li>
                    </ul>
                    <div>
                        <div class="t1">
                            <div class="auth">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">
                                        {{-- <label for="email">Электронная почта</label> --}}
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required placeholder="Введите адрес электронной почты">

                                        @if ($errors->has('email'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        {{-- <label for="name">Имя пользователя</label> --}}
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" value="{{ old('name') }}" required autofocus placeholder="Введите имя пользователя">

                                        @if ($errors->has('name'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        {{-- <label for="phone">Номер Телефона</label> --}}
                                        <input id="phone2" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                            name="phone" value="{{ old('phone') }}" placeholder="Телефон"
                                            maxlength="15" title="7 707 777 77 77" required autofocus>

                                        @if ($errors->has('phone'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        {{-- <label for="password">Пароль</label> --}}
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" required placeholder="Введите пароль">

                                        @if ($errors->has('password'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        {{-- <label for="password-confirm">Повторите пароль</label> --}}
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                            required placeholder="Повторите введенный пароль">
                                    </div>

                                    <div class="form-group row m-t-20">
                                        <div class="col-12 text-right">
                                            <button class="login2" type="submit">Регистрация</button>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group m-t-30 mb-0 row">
                                        <div class="col-12">
                                            <p class="font-12 text-center text-muted mb-0">Регистрируясь, вы соглашаетесь с <a href="#" class="text-primary">условиями использования</a></p>
                                        </div>
                                    </div> --}}

                                </form>
                            </div>
                        </div>
                        <div class="t1">
                            <div class="auth">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">
                                        {{-- <label for="name">Имя пользователя</label> --}}
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" value="{{ old('name') }}" required autofocus placeholder="Ваше имя">

                                        @if ($errors->has('name'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        {{-- <label for="email">Электронная почта</label> --}}
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required placeholder="Email">

                                        @if ($errors->has('email'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                        @endif
                                    </div>



                                    <div class="form-group">
                                        {{-- <label for="phone">Номер Телефона</label> --}}
                                        <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                            name="phone" value="{{ old('phone') }}" placeholder="Телефон"
                                            maxlength="15" title="7 707 777 77 77" required autofocus>

                                        @if ($errors->has('phone'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                    <br>


                                    <div class="form-group">
                                            {{-- <label for="companyname">Наименование организации</label> --}}
                                            <input id="companyname" type="companyname" class="form-control{{ $errors->has('companyname') ? ' is-invalid' : '' }}" name="companyname" value="{{ old('companyname') }}" required placeholder="Наименование организации">
                                    </div>

                                    <div class="form-group">
                                            {{-- <label for="address">Адрес</label> --}}
                                            <input id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required placeholder="Юридический адрес">
                                    </div>

                                    <div class="form-group">
                                            {{-- <label for="innbin">ИИН/БИН компании</label> --}}
                                            <input id="innbin" type="innbin" class="form-control{{ $errors->has('innbin') ? ' is-invalid' : '' }}" name="innbin" value="{{ old('innbin') }}" required placeholder="ИИН/БИН">
                                    </div>
                                    <br>
                                    {{-- <div class="form-group">
                                            <label for="email">Сфера деятельности организации</label>
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Введите адрес электронной почты">
                                    </div> --}}

                                    <div class="form-group">
                                        {{-- <label for="password">Пароль</label> --}}
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" required placeholder="Введите пароль">

                                        @if ($errors->has('password'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        {{-- <label for="password-confirm">Повторите пароль</label> --}}
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                            required placeholder="Повторите введенный пароль">
                                    </div>

                                    <div class="form-group row m-t-20">
                                        <div class="col-12 text-right">
                                            <button class="login2" type="submit">Регистрация</button>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group m-t-30 mb-0 row">
                                        <div class="col-12">
                                            <p class="font-12 text-center text-muted mb-0">Регистрируясь, вы соглашаетесь с
                                                <a href="#" class="text-primary">условиями использования</a></p>
                                        </div>
                                    </div> --}}

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="home-btn d-none d-sm-block"><a href="/" class="text-white"><i class="mdi mdi-home h1"></i></a></div>
    <div class="wrapper-page">
        <div class="m-t-40 text-center text-white-50">
            <p class="avtoriz">Уже зарегистрированы? <a href="{{ url("login") }}" class="register font-400 text-white">Войдите</a></p>
        </div>
    </div>
@endsection
