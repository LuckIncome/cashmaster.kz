@extends('layouts.master')

@section('content')
<div class="inner-content-block">
		<div class="inner-content">
			<div class="inner">
            <div class="card">
                    <div class="inner-zag"><h1>Авторизация</h1></div>
                        <div class="services-inner" style="margin-top: 0;">
                                <div class="auth">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail') }}</label> --}}

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="E-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Пароль" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label> --}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="login">
                                    {{ __('Войти') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a  class="register" href="{{ route('register') }}">Регистрация</a>
                                    <div><a class="register btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    {{-- <a  class="register" href="{{ route('register') }}">Регистрация</a> --}}

                                    </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
