@extends('layouts.master')
@section('content')
<div class="partners">
    @foreach ($partner as $partners)
        <div class="partners-img">
            <a href="{{$partners->name}}">
                <img src="{{ Storage::url($partners->image) }}" alt="{{ $partners->name }}" style="width:150px;">
            </a>
        </div>
    @endforeach
</div>
<style>
.partners{
    width: 100%;
    max-width: 1200px;
    height: 74px;
    margin: 0 auto;
    padding-top: 174px;
    display: flex;
    justify-content: space-between;
    padding-bottom: 241px;
    flex-wrap:wrap;
    margin-bottom: 297px;    
}    
.partners-img {
    width: 300px;
        margin-bottom: 50px;
}
</style>
@endsection
