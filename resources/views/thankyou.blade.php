@extends('layouts.master')
@section('content')
<div class="page404 head2-1 thankyou">
    <div class="thankyou-div">Спасибо за регистрацию!</div>
    <a href="/">Главная</a> Вас перенаправят на главную страницу!
</div>
<style>
    .page404 {
        padding-top: 194px;
    }
    .page404.head2-1.thankyou {
        text-align: center;
    }

    .thankyou-div {
        font-size: 27px;
    }
    .page404.head2-1.thankyou {
        margin-bottom: 40px;
    }
    
    .thankyou-div {
        padding-bottom: 15px;
    }    
</style>
<script>
    setTimeout( 'location="/";', 5000 );
</script>
@endsection
