@extends('layouts.master')
@section('title', $seo[8]->title ?? $seo[8]->Name)
@section('description', $seo[8]->description ?? $seo[8]->Name)
@section('keywords', $seo[8]->keywords ?? $seo[8]->Name)
@section('content')
<style>
    .menu li:hover ul{
        display: none !important;
    }
</style>
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>Каталог</h1></div>
            <ul class="inner-cat">
                @foreach ($categories as $item)
                    <li>
                        <a href="{{ route('category.index2', $item) }}">
                            <div class="ca" style="background: url({{ Storage::url($item->image) }}) center right no-repeat;">
                                
                            </div>
                            {{$item->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="top-main-block">
    <div class="top-main">
        <div class="top">
            <div class="top-zag"><span>Топ продаж</span></div>
            <div class="owl-carousel owl-carousels">
                @foreach ($productSell as $item)
                <div class="item">
                    <a href="#">
                        <div class="item-img">
                            {{-- <div class="ss"><a href="#" class="kuptov atc" data-id="{{ $item->id }}">Купить товар</a></div> --}}
                            <div class="ss"><a href="{{route('category.index3', [$item->category, $item])}}" class="kuptov">Подробнее</a></div>
                            <table>
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url($item->image) }}" alt="Товар">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </a>
                    @if (Auth::check())
                        @if (Auth::user()->hasRole('entity'))
                            <a class="cena" href="{{route('category.index3', [$item->category, $item])}}">{{$item->entityprice}} ₸</a><br>
                            <a class="cena" href="{{route('category.index3', [$item->category, $item])}}">{{$item->individualprice}} ₸</a><br>
                        @else
                            {{--  <span class="cena">{{$item->individualprice}} ₸</span><br>  --}}
                        @endif
                    @endif
                    <a class="cena" href="{{route('category.index3', [$item->category, $item])}}">{{$item->individualprice}} ₸</a><br>
                    <div class="tov-name"><a href="{{route('category.index3', [$item->category, $item])}}">{{$item->name}}</a></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="news-main-block" style="background: #fff; border-bottom: 1px solid #e1e1e1;">
    <div class="news-main">
        <div class="news">
            <div class="news-zag"><h1>Наши партнеры</h1><a href="/partners" class="all-part">Смотреть всех партнеров</a></div>
            <div class="owl-carousel car3">
                @foreach ($partner as $item)
                    <a href="{{$item->name}}" target="_blank">
                        <div class="item partner">
                            <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" rel="nofollow" style="width:150px;">
                        </div>
                    </a>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection
