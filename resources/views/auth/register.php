<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Cash Master - Регистрация</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App Icons -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Basic Css files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body class="fixed-left">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="home-btn d-none d-sm-block"><a href="/" class="text-white"><i class="mdi mdi-home h1"></i></a></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <div class="p-3">
                    <a href="/" class="logo-admin"><img src="assets/images/logo_dark.png" height="35" alt="logo"></a>
                </div>
                <div class="p-3">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span
                                    class="d-none d-md-block">Физическое лицо</span><span class="d-block d-md-none"><i
                                        class="mdi mdi-home-variant h5"></i></span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span
                                    class="d-none d-md-block">Юридическое лицо</span><span class="d-block d-md-none"><i
                                        class="mdi mdi-account h5"></i></span></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="home2" role="tabpanel">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email">Электронная почта</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" required placeholder="Введите адрес электронной почты">

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Имя пользователя</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{ old('name') }}" required autofocus placeholder="Введите имя пользователя">

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="phone">Номер Телефона</label>
                                    <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                        name="phone" value="{{ old('phone') }}" placeholder="7 707 777 77 77" pattern="[7]{1} [0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}"
                                        maxlength="15" title="7 707 777 77 77" required autofocus>

                                    @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required placeholder="Введите пароль">

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">Повторите пароль</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                        required placeholder="Повторите введенный пароль">
                                </div>

                                <div class="form-group row m-t-20">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Зарегистрироваться</button>
                                    </div>
                                </div>

                                <div class="form-group m-t-30 mb-0 row">
                                    <div class="col-12">
                                        <p class="font-12 text-center text-muted mb-0">Регистрируясь, вы соглашаетесь с
                                            <a href="#" class="text-primary">условиями использования</a></p>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane p-3" id="profile2" role="tabpanel">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email">Электронная почта</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" required placeholder="Введите адрес электронной почты">

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Имя пользователя</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{ old('name') }}" required autofocus placeholder="Введите имя пользователя">

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="phone">Номер Телефона</label>
                                    <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                        name="phone" value="{{ old('phone') }}" placeholder="7 707 777 77 77" pattern="[7]{1} [0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}"
                                        maxlength="15" title="7 707 777 77 77" required autofocus>

                                    @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                        <label for="address">Адрес</label>
                                        <input id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required placeholder="Введите адрес организации">
                                </div>

                                <div class="form-group">
                                        <label for="companyname">Наименование организации</label>
                                        <input id="companyname" type="companyname" class="form-control{{ $errors->has('companyname') ? ' is-invalid' : '' }}" name="companyname" value="{{ old('companyname') }}" required placeholder="Введите наименование организации">
                                </div>

                                <div class="form-group">
                                        <label for="innbin">ИИН/БИН компании</label>
                                        <input id="innbin" type="innbin" class="form-control{{ $errors->has('innbin') ? ' is-invalid' : '' }}" name="innbin" value="{{ old('innbin') }}" required placeholder="Введите ИИН/БИН компании">
                                </div>

                                {{-- <div class="form-group">
                                        <label for="email">Сфера деятельности организации</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Введите адрес электронной почты">
                                </div> --}}

                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required placeholder="Введите пароль">

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">Повторите пароль</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                        required placeholder="Повторите введенный пароль">
                                </div>

                                <div class="form-group row m-t-20">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Зарегистрироваться</button>
                                    </div>
                                </div>

                                <div class="form-group m-t-30 mb-0 row">
                                    <div class="col-12">
                                        <p class="font-12 text-center text-muted mb-0">Регистрируясь, вы соглашаетесь с
                                            <a href="#" class="text-primary">условиями использования</a></p>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-t-40 text-center text-white-50">
            <p>Уже зарегистрированы? <a href="{{ url("login") }}" class="font-400 text-white">Войдите</a></p>
            <p>© 2018 IMarketing LLC | Midnight Inc. - Ryan Thomas</p>
        </div>
    </div>
    <!-- end wrapper-page -->
    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>