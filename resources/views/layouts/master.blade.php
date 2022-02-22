<?php $v = '112';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, itial-scale=1, maximus-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">    
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/build/css/style.css?v={{$v}}" />
    <link rel="stylesheet" type="text/css" href="/build/css/screen.css" />
    <link rel="stylesheet" href="/build/css/fancybox.css" />
      	<link rel="stylesheet" href="/build/modal/reveal.css">
    	<script type="text/javascript" src="/build/modal/js.js"></script>
    	<script type="text/javascript" src="/build/modal/jquery.reveal.js"></script>	    
</head>
<body>

    <div id="preloader">
        <div id="preloader-icon">&nbsp;</div>
    </div>


    <div id="app">
        @include('partials.header')
        @yield('content')
        @include('partials.footer')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>$(document).ready(function(){$("#status").fadeOut(),$("#preloader").delay(350).fadeOut("slow"),$("body").delay(350).css({overflow:"visible"})});   
    </script>

    <script src="{{ asset('build/js/owl1.js') }}"></script>
    <script src="{{ asset('build/js/owl2.js') }}"></script>
    <script src="{{ asset('build/js/owl2-2.js') }}"></script>
    <script src="{{ asset('build/js/owl2-3.js') }}"></script>
    <script>$(".car2").owlCarousel2({loop:!0,margin:30,nav:!0,items:3,autoplay:!1,autoplayTimeout:1e3,autoplayHoverPause:!0,responsiveClass:!0,responsive:{0:{items:1},400:{items:1},768:{items:2},1300:{items:3}}}),$(".car3").owlCarousel3({loop:!0,margin:30,nav:!0,items:3,autoplay:!1,autoplayTimeout:1e3,autoplayHoverPause:!0,responsiveClass:!0,responsive:{0:{items:2},768:{items:4},1300:{items:6}}}),$(".owl-carousels").owlCarousel({loop:!0,margin:30,nav:!0,items:4,autoplay:!1,autoplayTimeout:1e3,autoplayHoverPause:!0,responsiveClass:!0,responsive:{0:{items:2},375:{items:2},800:{items:3},1100:{items:4}}}),$(".about-slider").owlCarousel({loop:!0,margin:10,items:3,nav:!0,responsive:{0:{items:1},600:{items:1},1e3:{items:3}}}),$(".about-sliders").owlCarousel({loop:!0,margin:30,nav:!0,items:1,autoplay:!1,autoplayTimeout:1e3,autoplayHoverPause:!0,responsiveClass:!0,responsive:{0:{items:1},375:{items:1},800:{items:1},1100:{items:1}}});</script>
    <script type="text/javascript">function openbox(e){display=document.getElementById(e).style.display,"none"==display?document.getElementById(e).style.display="block":document.getElementById(e).style.display="none"}     
    </script>

    <script src="{{ asset('build/js/jquery.maskedinput.min.js') }}"></script>
    <script type="text/javascript">jQuery(function(n){n("#phone").mask("+7(999) 999-9999"),n(".phone-mask").mask("+7(999) 999-9999")}),jQuery(function(n){n("#phone2").mask("+7(999) 999-9999")});       
    </script>
    <script>
        $(".atc").click(function(){$.ajax({url:"/cart/add",data:{id:$(this).data("id")},method:"get",success:function(c){console.log(c),$(".badge").html(c)},error:function(c){console.log(c)}})});
    </script>
    {{-- <script>
            $(".atc2").click(function(){$.ajax({url:"/cart/add22",data:{id:$(this).data("id")},method:"get",success:function(c){console.log(c),$(".badge").html(c)},error:function(c){console.log(c)}})});
        </script> --}}
    <script>
var settings={objModalPopupBtn:".modalButton",objModalCloseBtn:".overlay, .closeBtn",objModalDataAttr:"data-popup"};$(settings.objModalPopupBtn).bind("click",function(){if($(this).attr(settings.objModalDataAttr)){var t=$(this).attr(settings.objModalDataAttr);$(".overlay, #"+t).fadeIn()}}),$(settings.objModalCloseBtn).bind("click",function(){$(".modal").fadeOut()});        
    </script>
    <script type="text/javascript" src="{{ asset('build/js/mobilyslider.js') }}"></script>
    <script type="text/javascript" src="/build/js/init.js?v={{$v}}"></script>
    <script type="text/javascript" src="{{ asset('build/js/tabs.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/js/accordeon.js') }}"></script>
    <script src="{{ asset('build/js/fancybox.js') }}"></script>
    {{--  <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>  --}}

</body>
</html>
