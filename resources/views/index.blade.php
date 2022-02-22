@extends('layouts.master')
@section('title', $seo[0]->title ?? $seo[0]->Name)
@section('description', $seo[0]->description ?? $seo[0]->Name)
@section('keywords', $seo[0]->keywords ?? $seo[0]->Name)
@section('content')
<div class="slider" id="slider">
    <div class="sliderContent" id="slider-content">
        @foreach ($categories as $item)
            @if($item->id==57)
            
            @else
            <div class="item" style="background: url({{ Storage::url($item->slide) }}) center no-repeat;">
                <div class="slider-text"><h1>{{$item->name}}</h1><br><a href="{{ route('category.index2', $item) }}">Перейти в каталог</a></div>
            </div>
            
                
            @endif    
        @endforeach
        <div class="item" style="background: url({{ Storage::url($categories[4]->slide) }}) center no-repeat;">
            <div class="slider-text"><h1>{{$categories[4]->name}}</h1><br><a href="/service">Ознакомиться с услугами</a></div>
        </div>
        {{--<div class="item" style="background: url(build/img/bankovskie.jpg) center no-repeat;">
            <div class="slider-text"><h1>Банковские терминалы</h1><br><a href="/catalog/Bank">Перейти в каталог</a></div>
        </div>
        <div class="item" style="background: url(build/img/platezhnie.jpg) center no-repeat;">
            <div class="slider-text"><h1>Платежные терминалы</h1><br><a href="/catalog/Post">Перейти в каталог</a></div>
        </div>
        <div class="item" style="background: url(build/img/komplectuishi.jpg) center no-repeat;">
            <div class="slider-text"><h1>Комплектующие</h1><br><a href="/catalog/Komplektuyushchie">Перейти в каталог</a></div>
        </div>--}}
        {{--<div class="item" style="background: url(build/img/servisnoe-obsluzhivanie.jpg) center no-repeat;">
            <div class="slider-text"><h1>Сервисное обслуживание</h1><br><a href="/Zapasnye-chasti">Ознакомиться с услугами</a></div>
        </div>
        <div class="item" style="background: url(build/img/servisnoe-obsluzhivanie.jpg) center no-repeat;">
            <div class="slider-text"><h1>Сервисное обслуживание</h1><br><a href="/service">Ознакомиться с услугами</a></div>
        </div>--}}
    </div>
</div>
<div class="top-main-block">
    <div class="top-main">
        <div class="top">
            <div class="top-zag"><span>Топ продаж</span></div>
            <div class="owl-carousel  owl-carousels">
                @foreach ($productSell as $item)
                    <div class="item">
                        <a href="#">
                            <div class="item-img">
                                {{-- <div class="ss"><a href="#" class="kuptov atc" data-id="{{ $item->id }}">Купить товар</a></div> --}}
                                <div class="ss"><a href="{{route('category.index3', [$item->category, $item])}}" class="kuptov">Подробнее</a></div>
                                <table>
                                    <tr>
                                        <td>
                                            <a href="{{route('category.index3', [$item->category, $item])}}">
                                                <img src={{ Storage::url($item->image) }} alt="{{ $item->name }}" alt="Товар">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </a>
                        @if($item->valut == 1)
                            @if (Auth::check())
                                @if (Auth::user()->hasRole('entity')) 
                                    <a class="cena cena-ur" href="{{route('category.index3', [$item->category, $item])}}">{{$item->entityprice * $currency[0]->coefficient}} ₸</a><br>
                                    <a class="cena cena-fiz" href="{{route('category.index3', [$item->category, $item])}}">{{$item->individualprice * $currency[0]->coefficient}} ₸</a><br>
                                @else
                                    <a class="cena" href="{{route('category.index3', [$item->category, $item])}}">{{$item->individualprice * $currency[0]->coefficient}} ₸</a><br>
                                @endif
                            @endif
                            @guest
                               <a class="cena" href="{{route('category.index3', [$item->category, $item])}}">{{$item->individualprice * $currency[0]->coefficient}} ₸</a><br>
                            @endauth
                            {{-- <span class="cena">{{$item->individualprice}} ₸</span><br>  --}}
                        @else
                            @if (Auth::check())
                                @if (Auth::user()->hasRole('entity')) 
                                    <a class="cena cena-ur" href="{{route('category.index3', [$item->category, $item])}}">{{$item->entityprice}} ₸</a><br>
                                    <a class="cena cena-fiz" href="{{route('category.index3', [$item->category, $item])}}">{{$item->individualprice}} ₸</a><br>
                                @else
                                    <a class="cena" href="{{route('category.index3', [$item->category, $item])}}">{{$item->individualprice}} ₸</a><br>
                                @endif
                            @endif
                            @guest
                               <a class="cena" href="{{route('category.index3', [$item->category, $item])}}">{{$item->individualprice}} ₸</a><br>
                            @endauth
                        @endif
                        <div class="tov-name"><a href="{{route('category.index3', [$item->category, $item])}}">{{$item->name}}</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="about-main-block">
    <div class="about-main">
        <div class="about">
            <h1>{{$about[0]->name}}</h1>
            <div class="about-text">
                <div>
                    {!! \Illuminate\Support\Str::words($about[0]->description, 88,'...')  !!}
                </div>

                <a href="/build/img/book.xlsx" class="zvonok" style="float: left; margin: 0 0 0 30px !important;">Скачать прайс</a>
            </div>
            <div class="about-video">
                <video width="100%" height="300" controls="controls" poster="{{ asset('build/img/hqdefault.jpg') }}">
               
               <source src="{{ asset('build/img/video.mp4') }}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
               

              </video>      
            </div>
        </div>
    </div>
</div>
<div class="news-main-block">
    <div class="news-main">
        <div class="news">
            <div class="news-zag"><h1>Полезные публикации</h1><a href="/article" class="all-news">Смотреть все публикации</a></div>
            <div class="owl-carousel car2">
               
                @foreach ($article as $item)
                    <a href="/article/{{ $item->id }}" style="display: block;">
    					<div class="item new" style="width: 100%; box-sizing: border-box">
    						
    						{{ $item->created_at->format('Y-m-d')}}
                            <h2>{{ $item->name }}</h2>
    					</div>
    				</a>
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