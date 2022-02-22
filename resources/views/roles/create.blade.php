@extends('layouts.administrator')

@section('content')
<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title mb-0">Пользователи</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Пользователи</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Создать пользователя</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-pane p-3" id="profile2" role="tabpanel">
                            <form method="POST" action="{{ route('user.store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="email">Электронная почта</label>
                                    <div class="col-sm-10"><input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" required placeholder="Введите адрес электронной почты"></div>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="name">Имя пользователя</label>
                                    <div class="col-sm-10"><input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{ old('name') }}" required autofocus placeholder="Введите имя пользователя"></div>

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="phone">Номер Телефона</label>
                                    <div class="col-sm-10"><input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                        name="phone" value="{{ old('phone') }}" placeholder="7 707 777 77 77" pattern="[7]{1} [0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}"
                                        maxlength="15" title="7 707 777 77 77" required autofocus></div>

                                    @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="address">Адрес</label>
                                    <div class="col-sm-10"><input id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                        name="address" value="{{ old('address') }}" required placeholder="Введите адрес организации"></div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="companyname">Наименование организации</label>
                                    <div class="col-sm-10"><input id="companyname" type="companyname" class="form-control{{ $errors->has('companyname') ? ' is-invalid' : '' }}"
                                        name="companyname" value="{{ old('companyname') }}" required placeholder="Введите наименование организации"></div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="innbin">ИИН/БИН компании</label>
                                    <div class="col-sm-10"><input id="innbin" type="innbin" class="form-control{{ $errors->has('innbin') ? ' is-invalid' : '' }}"
                                        name="innbin" value="{{ old('innbin') }}" required placeholder="Введите ИИН/БИН компании"></div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="email">Сфера деятельности организации</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" required placeholder="Введите адрес электронной почты">
                                </div> --}}

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="password">Пароль</label>
                                    <div class="col-sm-10"><input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required placeholder="Введите пароль"></div>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                {{-- <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="password-confirm">Повторите пароль</label>
                                    <div class="col-sm-10"><input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                        required placeholder="Повторите введенный пароль"></div>
                                </div> --}}

                                <div class="form-group row m-t-20">
                                    <div class="text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Зарегистрироваться</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- content -->
    @endsection