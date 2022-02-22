@extends('layouts.master')
@section('content')
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>{{$otherpage[3]->name}}</h1></div>
            <div class="services-inner-otherpage" style="margin-top: 0;">
                {!!$otherpage[3]->description!!}
            </div>
        </div>
    </div>
</div>

<div class="news-main-block" style="background: #fff; border-bottom: 1px solid #e1e1e1;">
    <div class="news-main">
        <div class="news">
            <div class="news-zag"><h1>Наши партнеры</h1><a href="#" class="all-part">Смотреть всех партнеров</a></div>
            <div class="owl-carousel car3">
                <a rel="nofollow" href="#">
                    <div class="item partner">
                        <img src="{{ asset('build/img/l1.png') }}" rel="nofollow" alt="Партнер">
                    </div>
                </a>
                <a rel="nofollow" href="#">
                    <div class="item partner">
                        <img src="{{ asset('build/img/l2.png') }}" rel="nofollow" alt="Партнер">
                    </div>
                </a>
                <a rel="nofollow" href="#">
                    <div class="item partner">
                        <img src="{{ asset('build/img/l3.png') }}" rel="nofollow" alt="Партнер">
                    </div>
                </a>
                <a rel="nofollow" href="#">
                    <div class="item partner">
                        <img src="{{ asset('build/img/l4.png') }}" rel="nofollow" alt="Партнер">
                    </div>
                </a>
                <a rel="nofollow" href="#">
                    <div class="item partner">
                        <img src="{{ asset('build/img/l5.png') }}" rel="nofollow" alt="Партнер">
                    </div>
                </a>
                <a rel="nofollow" href="#">
                    <div class="item partner">
                        <img src="{{ asset('build/img/l6.png') }}" rel="nofollow" alt="Партнер">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection