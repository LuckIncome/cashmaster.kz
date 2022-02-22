@extends('layouts.master')
@section('content')
<!-- Start content -->
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="tovary-col1">
                <a href="lk1.html" class="il il1 il-active"><img src="{{ asset('build/img/profile.svg') }}"> Личные данные</a>
                <a href="lk2.html" class="il il2"><img src="{{ asset('build/img/list.svg') }}"> История заказовwwwww</a>
                <a href="lk3.html" class="il il2"><img src="{{ asset('build/img/edit.svg') }}"> Редактировать профиль</a>
                {{-- <a href="lk.html" class="il il3"><img src="{{ asset('build/img/logout.svg') }}"> Выйти</a> --}}
                <a class="il il3" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <img src="{{ asset('build/img/logout.svg') }}">Выйти {{-- {{ __('Logout') }} --}}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
            </div>
            <div class="tovary-col2">
                <div class="inner-zag2">
                    <h1>Личные данные</h1>
                    <div class="inner-bread">
                        <div class="b1">
                            <a href="index.html">Главная</a>  »  
                            <a href="#">Кабинет</a>  »  
                            Личные данные
                        </div>
                    </div>
                    <div class="lk-block">
                        <div class="lk-menu">
                            <a href="lk1.html" class="il il1 il-active"><img src="img/profile.svg"> Личные данные</a>
                            <a href="lk2.html" class="il il2"><img src="img/list.svg"> История заказов</a>
                            <a href="lk3.html" class="il il2"><img src="img/edit.svg"> Редактировать профиль</a>
                            {{-- <a href="lk.html" class="il il3"><img src="img/logout.svg"> Выйти</a> --}}
                            <a class="il il3" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <img src="{{ asset('build/img/logout.svg') }}">Выйти {{-- {{ __('Logout') }} --}}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        <table>
                            <tr>
                                <td>
                                    <h3>{{ Auth::user()->name }}</h3>
                                    <h3>{{ Auth::user()->firstname }}</h3>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Телефон:</b> {{ Auth::user()->phone }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Почта:</b> {{ Auth::user()->email }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content -->
@endsection