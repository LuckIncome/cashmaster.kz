@extends('layouts.master')
@section('title', $seo[5]->title ?? $seo[5]->Name)
@section('description', $seo[5]->description ?? $seo[5]->Name)
@section('keywords', $seo[5]->keywords ?? $seo[5]->Name)
@section('content')
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>Вакансии</h1></div>
            <div class="tabs">
                <a href="/about">О компании</a>
                <a href="/project">Наши проекты</a>
                <a href="/cooperation">Сотрудничество</a>
                <a href="#" class="active">Вакансии</a>
            </div>
            @foreach ($vacancy as $item)
                {{--<div style="text-align:center;font-size: 35px;">{{$item->name}}</div>--}}                
                <div style="margin-bottom:20px;">{!!$item->description!!}</div>                
            @endforeach
        </div>
    </div>
</div>
@endsection