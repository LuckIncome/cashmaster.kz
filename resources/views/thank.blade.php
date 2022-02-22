@extends('layouts.master')
@section('content')
<div class="thank">Заказ №{{ $zakaz_id }}! Спасибо, ваша заявка принята! Мы свяжемся с вами в ближайшее время</div>
<div class="thank2"><a href="/" style="text-align:center;">На главную</a></div>
<style>
.thank {
    width: 100%;
    float: left;
    margin-top: 180px;
    text-align: center;
    font-size: 27px;
        padding-bottom: 30px;
}   
.thank2 {
      text-align: center;  
           padding-bottom: 30px;
}    
    
</style>
@endsection