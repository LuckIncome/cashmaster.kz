@extends('layouts.master')
@section('title', $seo[4]->title ?? $seo[4]->Name)
@section('description', $seo[4]->description ?? $seo[4]->Name)
@section('keywords', $seo[4]->keywords ?? $seo[4]->Name)
@section('content')
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>{{$otherpage[5]->name}}</h1></div>
            <div class="tabs">
                <a href="/about">О компании</a>
                <a href="/project">Наши проекты</a>
                <a href="/cooperation" class="active">Сотрудничество</a>
                <a href="/vacancy">Вакансии</a>
            </div>
            <div class="services-inner" style="margin-top: 0;text-align:left;">
                {!!$otherpage[5]->description!!}
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
                    <a rel="nofollow" href="{{$item->name}}" target="_blank">
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
