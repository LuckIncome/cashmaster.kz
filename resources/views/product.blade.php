@extends('layouts.master')
@section('title', $product->title ?? $product->name)
@section('description', $product->metadesc ?? $product->name)
@section('keywords', $product->keywords ?? $product->name)
@section('content')
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner tovar-inner">
            <div class="inner-bread">
                <div class="b1">
                    <a href="/">Главная</a>  »
                    <a href="/catalog">Каталог</a>  »
                    @if($category->id==2)
                        <a href="/catalog/"></a>  »
                    @else        
                        <a href="/catalog/{{ $category->parent->slug }}">{{ $category->parent->name }}</a>  »
                    @endif
                    <a href="/catalog/{{ $category->slug }}">{{ $category->name }} </a>  »
                    {{ $product->name }}
                </div>
                {{-- @foreach ($products as $item) --}}
                    <div class="inner-zag"><h1>{{ $product->name }}</h1></div>
                {{-- @endforeach --}}
            </div>
            {{-- @foreach ($products as $item) --}}
            <div class="tovar-row1">
                <a href="#">
                    <table class="tovar-row1-img">
                        <tr>
                            <td><a data-fancybox="gallery" href="{{ Storage::url($product->image) }}"><img src={{ Storage::url($product->image) }} alt="{{ $product->name }}" alt="Товар"></a></td>
                        </tr>
                    </table>
                </a>
                <div class="tovar-row1-img-mini">
                    @if($product->image1 == !null)
                       
                    <a href="#">
                        <table class="tovar-row1-img2">
                            <tr>
                                <td><a data-fancybox="gallery" href="{{ Storage::url($product->image1) }}"><img src={{ Storage::url($product->image1) }} alt="{{ $product->name }}" alt="Товар"></a></td>
                            </tr>
                        </table>
                    </a>
                    @else
                     
                    @endif
                    @if($product->image2 == !null)
                    <a href="#">
                        <table class="tovar-row1-img2">
                            <tr>
                                <td><a data-fancybox="gallery" href="{{ Storage::url($product->image2) }}"><img src={{ Storage::url($product->image2) }} alt="{{ $product->name }}" alt="Товар"></a></td>
                            </tr>
                        </table>
                    </a>
                    @else
                     
                    @endif
                    @if($product->image3 == !null)
                    <a href="#">
                        <table class="tovar-row1-img2">
                            <tr>
                                <td><a data-fancybox="gallery" href="{{ Storage::url($product->image3) }}"><img src={{ Storage::url($product->image3) }} alt="{{ $product->name }}" alt="Товар"></a></td>
                            </tr>
                        </table>
                    </a>
                    @else
                     
                    @endif
                    
                    
                    
                    
                    @if($product->image4 == !null)
                       
                    <a href="#">
                        <table class="tovar-row1-img2">
                            <tr>
                                <td><a data-fancybox="gallery" href="{{ Storage::url($product->image4) }}"><img src={{ Storage::url($product->image4) }} alt="{{ $product->name }}" alt="Товар"></a></td>
                            </tr>
                        </table>
                    </a>
                    @else
                     
                    @endif
                    @if($product->image5 == !null)
                    <a href="#">
                        <table class="tovar-row1-img2">
                            <tr>
                                <td><a data-fancybox="gallery" href="{{ Storage::url($product->image5) }}"><img src={{ Storage::url($product->image5) }} alt="{{ $product->name }}" alt="Товар"></a></td>
                            </tr>
                        </table>
                    </a>
                    @else
                     
                    @endif
                    @if($product->image6 == !null)
                    <a href="#">
                        <table class="tovar-row1-img2">
                            <tr>
                                <td><a data-fancybox="gallery" href="{{ Storage::url($product->image6) }}"><img src={{ Storage::url($product->image6) }} alt="{{ $product->name }}" alt="Товар"></a></td>
                            </tr>
                        </table>
                    </a>
                    @else
                     
                    @endif
                </div>
            </div>
            {{-- @endforeach --}}

            <div class="tovar-row2">
                <div class="inner-zag"><h1>{{ $product->name }}</h1></div>
                {{--@if($product->category_id == 29)--}}
                
                {{--@elseif($product->category_id == 30)--}}
                
                @if($product->category_id == 2)
                
                @else
                    <div class="tovar-row2-cena">
                            <!--{{ $product->entityprice }} тг-->
                        @if($product->valut == 1)
                            @if (Auth::check())
                                @if (Auth::user()->hasRole('entity'))
                                    <a class="cena cena-ur" href="{{route('category.index3', [$item->category, $item])}}">{{$product->entityprice * $currency[0]->coefficient}} ₸</a>
                                    <a class="cena cena-fiz" href="{{route('category.index3', [$item->category, $item])}}">{{$product->individualprice * $currency[0]->coefficient}} ₸</span>
                                @else
                                    {{$product->individualprice * $currency[0]->coefficient}} ₸
                                @endif
                            @else
                                {{$product->individualprice * $currency[0]->coefficient}} ₸
                            @endif
                        @else
                            @if (Auth::check())
                                @if (Auth::user()->hasRole('entity'))
                                    <a class="cena cena-ur" href="{{route('category.index3', [$item->category, $item])}}">{{$product->entityprice}} ₸</a>
                                    <a class="cena cena-fiz" href="{{route('category.index3', [$item->category, $item])}}">{{$product->individualprice}} ₸</a>
                                @else
                                    {{$product->individualprice}} ₸
                                @endif
                            @else
                                {{$product->individualprice}} ₸
                            @endif
                        @endif
                        <a href="#" class="kuptov atc" data-id="{{ $product->id }}">Добавить в корзину</a>
                    </div>
                @endif
                <div class="tovar-row2-info download-pro" style="margin-bottom: 26px;">
                    <b>Описание товара</b><br>
                    <p>{!! $product->description !!}</p>
                </div>
                @if($product->file == null)
                
                @else
                    <span class="download-pro"><a href="{{ Storage::url($product->file) }}" class="kuptov atc down" download>Скачать драйвер</a></span>
                @endif
                <div class="tovar-row2-table">
                     @foreach ($parameters as $item)
                        @if($item->value == null)
                        
                                
                        @else<b>Технические характеристики</b>@endif
                        @break
                    @endforeach
                    <table>
                        @foreach ($parameters as $item)
                        <tr>
                            <td class="tr1">{{ $item->value }}</td>
                            <td >{{ $item->label }}</td>
                            
                        </tr>
                        @endforeach
                        {{--<tr>
                            <td class="tr1">Параметр</td>
                            <td>Характеристика</td>
                        </tr>
                        <tr>
                            <td class="tr1">Параметр</td>
                            <td>Характеристика</td>
                        </tr>
                        <tr>
                            <td class="tr1">Параметр</td>
                            <td>Характеристика</td>
                        </tr>
                        <tr>
                            <td class="tr1">Параметр</td>
                            <td>Характеристика</td>
                        </tr>
                        <tr>
                            <td class="tr1">Параметр</td>
                            <td>Характеристика</td>
                        </tr>--}}
                    </table>
                </div>
            </div>
        </div>
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
