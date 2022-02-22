@extends('layouts.master')
@section('title', $articles->title ?? $articles->name)
@section('description', $articles->metadesc ?? $articles->name)
@section('keywords', $articles->keywords ?? $articles->name)
@section('content')
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>{{$articles->name}}</h1></div>
            <div class="services-inner services-inners articles_mw" style="margin-top: 0;">
                <div>
                    <div>{!!$articles->description!!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection