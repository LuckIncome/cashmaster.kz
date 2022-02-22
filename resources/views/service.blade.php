@extends('layouts.master')
@section('title', $seo[2]->title ?? $seo[2]->Name)
@section('description', $seo[2]->description ?? $seo[2]->Name)
@section('keywords', $seo[2]->keywords ?? $seo[2]->Name)
@section('content')
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>{{$otherpage[0]->name}}</h1></div>
            <div class="services-inners" style="margin-top: 0;">
                {!!$otherpage[0]->description!!}
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