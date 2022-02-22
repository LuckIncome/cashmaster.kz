@extends('layouts.master')
@section('title', $category->title ?? $category->name)
@section('description', $category->metadesc ?? $category->name)
@section('keywords', $category->keywords ?? $category->name)
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="tovary-col1">
                <ul class="accordion-menu">
                    @foreach ($categories as $item)
                        @if($category->parent_id)
                            <li class="{{$item->id == $category->parent_id ? 'open' : ''}}">
                        @else
                            <li class="{{$item->id == $category->id ? 'open' : ''}}">
                        @endif
                            @if($item->id==2)
                            <a href="/catalog/Bank" style="text-decoration:none"><div class="dropdownlink">{{$categories[1]->name}}<img src="{{ asset('build/img/d1.svg') }}" alt="Банковские терминалы"></div></a>
                            @else
                            @break($item->id == 57)
                            <div class="dropdownlink">{{$item->name}}<img src="{{ asset('build/img/d1.svg') }}" alt="{{$item->name}}"></div>
                            @endif

                            @if($category->parent_id)
                                <ul class="submenuItems" style="{{$item->id == $category->parent_id ? 'display: block;' : ''}}">
                            @else
                                <ul class="submenuItems" style="{{$item->id == $category->id ? 'display: block;' : ''}}">
                            @endif
                                @foreach($item->children as $subcategory)
                                <li>
                                    <a href="{{route('category.index2', ['category'=> $subcategory ])}}"
                                       class="{{$subcategory->id == $category->id ? 'active' : ''}}">
                                        {{ $subcategory->name }}
                                    </a>
                                </li>
                                {{-- <li><a href="{{route('category.index2', ['category'=> $subcategory, 'product'=>$product ])}}">{{ $subcategory->name }}</a></li> --}}
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tovary-col2">
                <div class="inner-zag2">
                    {{-- @foreach ($categories as $item) --}}
                        {{-- <h1>{{$categories->name}}</h1> --}}
                        {{-- {{$product->name}} --}}
                    {{-- @endforeach --}}
                    <div class="inner-bread">
                        <div class="b1">
                            <a href="/">Главная</a>  »
                            <a href="/catalog">Каталог</a>  »
                            @if($category->id==2)
                            {{ $category->name }}
                            @else
                            {{ $category->parent->name }}  
                            @endif
                            {{-- {{$category->parent_id->category_id->name}} --}}
                        </div>
                        <a href="/catalog" class="b2">Показать каталог</a>
                        <span>
                            <font class="b1">Сортировать</font>
                            <select id="dynamic_select">
                        	  <option value="" selected>По умолчанию</option>
                        	  <option value="?price=desc">От дорогих</option>
                        	  <option value="?price=asc">От дешевых</option>
                        	</select>
                        	<script>
                        	    $(function(){
                        	      // bind change event to select
                        	      $('#dynamic_select').on('change', function () {
                        	          var url = $(this).val(); // get selected value
                        	          if (url) { // require a URL
                        	              window.location = url; // redirect
                        	          }
                        	          return false;
                        	      });
                        	    });
                        	</script>
                            <div>
                                {{-- <div><a href="?price=desc">Сортировать по убыванию цен</a></div> --}}
                                {{-- <div><a href="?price=asc">Сортировать по возрастанию цен</a></div> --}}
                            </div>
                        </span>
                    </div>
                </div> 
                @if($category->id==2)
                <h1 class="zagolovok">{{ $category->name }}</h1>
                
                @else
                {{--<h1 class="zagolovok">{{ $category->parent->name }}</h1>--}}
                <h1 class="zagolovok">{{ $category->name }}</h1>
                @endif
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
                                            <a class="cena">{{$item->individualprice * $currency[0]->coefficient}} ₸</a><br>
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
                                    <a class="cena">{{$item->individualprice * $currency[0]->coefficient}} ₸</a><br>
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
