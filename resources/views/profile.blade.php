@extends('layouts.master')
@section('content')
<!-- Start content -->
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="tovary-col1">
                <a href="/index" class="il il1 il-active"><img src="{{ asset('build/img/profile.svg') }}"> Личные данные</a>
                <a href="/index/history" class="il il2"><img src="{{ asset('build/img/list.svg') }}"> История заказов</a>
                <a href="/index/{{ Auth::user()->id }}/edit" class="il il2"><img src="{{ asset('build/img/edit.svg') }}"> Редактировать профиль</a>
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
                                <a href="/index" class="il il1 il-active"><img src="{{ asset('build/img/profile.svg') }}"> Личные данные</a>
                                <a href="/index/history" class="il il2"><img src="{{ asset('build/img/list.svg') }}"> История заказов</a>
                                <a href="/index/{{ Auth::user()->id }}/edit" class="il il2"><img src="{{ asset('build/img/edit.svg') }}"> Редактировать профиль</a>
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
                        @if (Auth::check())
                            @if (Auth::user()->hasRole('entity'))
                                <table>
                                    <tr>
                                        <td>
                                            {{--  <h3>{{ Auth::user()->name }}</h3>  --}}
                                            <h3>{{ Auth::user()->companyname }}</h3>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Имя:</b> {{ Auth::user()->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>ИИН/БИН:</b> {{ Auth::user()->innbin }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Юр.адрес:</b> {{ Auth::user()->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Телефон:</b> {{ Auth::user()->phone }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Почта:</b> {{ Auth::user()->email}}
                                        </td>
                                    </tr>
                                </table>
                            @else
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
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content -->
@endsection
