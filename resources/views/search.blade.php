@extends('layouts.master')
@section('title', $seo[10]->title ?? $seo[10]->Name)
@section('description', $seo[10]->description ?? $seo[10]->Name)
@section('keywords', $seo[10]->keywords ?? $seo[10]->Name)
@section('content')

<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="tovary-col3">
                <div class="inner-zag2">
                    {{-- @foreach ($categories as $item) --}}
                        {{-- <h1>{{$categories->name}}</h1> --}}
                        {{-- {{$product->name}} --}}
                    {{-- @endforeach --}}
                    <div class="inner-bread">
                        <div class="b1">
                            <a href="/">Главная</a>  »
                            Поиск
                        </div>
                        <a href="/catalog" class="b2">Показать каталог</a>
                    </div>
                    Поиск по запросу "{{ $search }}"
                </div>
                @if($search==!null)
                    @foreach ($product as $item)
                        <div class="tov-inner2" onclick="location.href='{{route('category.index3', [$item->category, $item])}}'">
                                <a href="#">
                                    {{-- <div class="ss2"><a href="#" class="kuptov atc" data-id="{{ $item->id }}">Купить товар</a></div> --}}
                                    
                                        <div class="ss2"><a href="{{route('category.index3', [$item->category, $item])}}" class="kuptov">Подробнее</a></div>
                                    
                                    <div class="tov-inner-img">
                                        <table>
                                            <tr>
                                                <td>
                                                    <img src={{ Storage::url($item->image) }} alt="{{ $item->name }}" alt="Товар">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </a>
                            @if($item->valut == 1)
                                {{--@if($item->category_id == 29)--}}
                                
                                {{--@elseif($item->category_id == 30)--}}
                                
                                @if($item->category_id == 2)
                                    
                                @else
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
                                
                                    
                                @endif
                            @else
                                {{--@if($item->category_id == 29)--}}
                                
                                {{--@elseif($item->category_id == 30)--}}
                                
                                @if($item->category_id == 2)
                                    
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
                            @endif 
                            <div class="tov-name"><a href="{{ route('category.index3', [$item->category, $item]) }}">{{$item->name}}</a></div>
                        </div>
                    @endforeach
                @else

                @endif
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
