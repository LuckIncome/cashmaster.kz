@extends('layouts.master')
@section('title', $category->title ?? $category->name)
@section('description', $category->metadesc ?? $category->name)
@section('keywords', $category->keywords ?? $category->name)
@section('content')
test
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>{{$category->name}}</h1></div>
            {{-- {{dd($category)}} --}}
            <center>
                @if(!empty($categories))
                @foreach ($categories as $item)
                    <div class="category">
                        <a href="{{route('category.index2', $item)}}">
                            <div class="category-img">
                                <table>
                                    <tr>
                                        <td>
                                            <img src="{{ Storage::url($item->image) }}" alt="Товар">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </a>
                        <div class="category-text">
                        <a href="{{route('category.index2', $item)}}">{{$item->name}}</a>
                        </div>
                    </div>
                @endforeach
                @endif
                @if(!empty($products))
                    @if($products->count())
                    <p>Есть товар</p>
                        @foreach($products as $product)
                        <div>{{$product->name}}</div>
                        @endforeach
                    @else
                    <p>Нет товаров</p>
                    @endif
                @endif
            </center>
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
