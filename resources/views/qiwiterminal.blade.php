@extends('layouts.master')
@section('content')
<div class="thank">
Спасибо за ваш заказ!<br>

Номер вашего заказа - {{ $zakaz_id }}<br>

Сумма заказа: {{ $order_total }}<br>

Запомните или запишите его. При оплате в терминале Вам необходимо ввести именно этот номер заказа.<br>

Подробнее по оплате через терминал QIWI вы можете ознакомиться в <b>инструкции</b><br>
</div>
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