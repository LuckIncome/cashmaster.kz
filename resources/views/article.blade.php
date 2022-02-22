@extends('layouts.master')
@section('title', $seo[7]->title ?? $seo[7]->Name)
@section('description', $seo[7]->description ?? $seo[7]->Name)
@section('keywords', $seo[7]->keywords ?? $seo[7]->Name)
@section('content')
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>Полезная информация</h1></div>
            <div class="services-inner" style="margin-top: 0;">
                @foreach ($data as $item)
                    <a href="/article/{{ $item->id }}" class="article">
                        <span>
                            <table>
                                <tr>
                                    <td>
                                        {{ $item->created_at->format('Y-m-d')}}<br>
                                        <h2>{{ $item->name }}</h2>
                                    </td>
                                </tr>
                            </table>
                        </span>
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
