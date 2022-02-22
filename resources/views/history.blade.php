@extends('layouts.master')
@section('content')
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="tovary-col1">
                <a href="/index" class="il il1"><img src="{{ asset('build/img/profile.svg') }}"> Личные данные</a>
                <a href="/index/history" class="il il2 il-active"><img src="{{ asset('build/img/list.svg') }}"> История заказов</a>
                <a href="/index/{{ Auth::user()->id }}/edit" class="il il2"><img src="{{ asset('build/img/edit.svg') }}"> Редактировать профиль</a>
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
                    <h1>История заказов</h1>
                    <div class="inner-bread">
                        <div class="b1">
                            <a href="index.html">Главная</a>  »
                            <a href="#">Кабинет</a>  »
                            История заказов
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
                        @foreach ($orders as $item)
                            @if (Auth::user()->id == $item->userid )
                                {{-- {{ 'da' }} --}}
                                {{-- {{Auth::user()->id == $item->userid}} --}}
                                <div class="history-row">
                                    {{$item->name}}
                                    {{$item->created_at}}<br>
								    <a data-fancybox data-src="#hidden-content-1" href="javascript:;" >
                                        @foreach ($orders2 as $ord)
                                            @if($item->id == $ord->orders_user_id)
                                                {{$ord->name}}
                                            @endif
                                        @endforeach								        
								    </a><br>
								    <span>{{$item->status}} шт</span><Br>
                                    <h3>{{$item->totalprice}} тг</h3>
                                </div>
                                                           
                            @endif
                            
                            {{--@foreach($orders2 as $or)
                                @if($item->userid == $or->orders_user_id)
                                    <div class="test">{{$or->name}}</div>
                                @endif
                            @endforeach--}}
                            <div style="display: none;" id="hidden-content-1">
                              @foreach($orders2 as $or)
                                @if($item->userid == $or->orders_user_id)
                                    <div class="test">{{$or->name}}</div>
                                @endif
                            @endforeach
                            </div> 
                        @endforeach
                        {{-- {{ Auth::user()->id }} --}}
                        {{-- @foreach ($orders as $order)
                            @if (Auth::user()->id == $item->userid )
                                <div class="history-row">
                                    {{$order->name}}<br>
                                    <a href="#">{{$order->name}}</a><br>
                                    <span>2 шт</span><Br>
                                    <h3>150 000 тг</h3>
                                </div>
                            @endif
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
