@extends('layouts.master')
@section('title', $seo[1]->title ?? $seo[1]->Name)
@section('description', $seo[1]->description ?? $seo[1]->Name)
@section('keywords', $seo[1]->keywords ?? $seo[1]->Name)
@section('content')
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>О компании</h1></div>
            <div class="tabs">
                <a href="#" class="active">О компании</a>
                <a href="/project">Наши проекты</a>
                <a href="/cooperation">Сотрудничество</a>
                <a href="/vacancy">Вакансии</a>
            </div>
            <div class="about-ab-slider">
                <div class="owl-carousel owl-theme about-slider">
                    @foreach($pictures as $picture)
                        <div class="item"><a data-fancybox="gallery" href="{{ Storage::url($picture->image) }}"><img src="{{ Storage::url($picture->image) }}" alt="{{ $picture->name }}"></a></div>
                    @endforeach
                </div>                
            </div>
            <div class="about-ab-slider-text">
                {!!$about[0]->description!!}
            </div>
        </div>
    </div>
</div>
<div class="innet">
    <div class="innt">
        <div class="innexr">
            <div class="container">
        		<div class="about-ap-title">Мы предлагаем</div>
        		<div class="about-ap-text">
        			<div class="about-ap-text-block">
        				<div class="about-ap-text-block-svg"><img src="{{ asset('build/img/check-mark.png') }}"></div>
        				<div class="about-ap-text-block-text">
        					Широкий выбор продуктов с собственными решениями. Выберите решение которое отвечает вашим нуждам.
        				</div>
        			</div>
    				<div class="about-ap-text-block">
        				<div class="about-ap-text-block-svg"><img src="{{ asset('build/img/check-mark.png') }}"></div>
        				<div class="about-ap-text-block-text block-about-text2">
                            Готовые комплексные платежные решения от одного партнера.
        				</div>
        			</div>
        			<div class="about-ap-text-block">
        				<div class="about-ap-text-block-svg"><img src="{{ asset('build/img/check-mark.png') }}"></div>
        				<div class="about-ap-text-block-text">
        					Мы можем разработать дизайн, изготовить и улучшить ваши платежные продукты и сервисы.
        				</div>
        			</div>
        			<div class="about-ap-text-block">
        				<div class="about-ap-text-block-svg"><img src="{{ asset('build/img/check-mark.png') }}"></div>
        				<div class="about-ap-text-block-text">
        					Мы даем возможность нашим клиентам быть инновационными и прогрессивными и готовы обсудить любой нестандартный запрос.
        				</div>
        			</div>
        			<div class="about-ap-text-block">
        				<div class="about-ap-text-block-svg"><img src="{{ asset('build/img/check-mark.png') }}"></div>
        				<div class="about-ap-text-block-text block-about-text2">
        					Наша цель построить партнерство, основанное на доверии.
        				</div>
        			</div>
        			<div class="about-ap-text-block">
        				<div class="about-ap-text-block-svg"><img src="{{ asset('build/img/check-mark.png') }}"></div>
        				<div class="about-ap-text-block-text">
        					Мы гордимся нашей клиентоориентированностью. Отслеживая тенденции рынка, мы внедряем решения, отвечающие вашим запросам.
        				</div>
        			</div>
        			<div class="about-ap-text-block">
        				<div class="about-ap-text-block-svg"><img src="{{ asset('build/img/check-mark.png') }}"></div>
        				<div class="about-ap-text-block-text">
        					Все наши товары и технологии предлагают высочайший уровень безопасности и долговечности. А так же показатели быстрого внедрения, с низкими затратами на установку и рабочую силу.
        				</div>
        			</div>
        			<div class="about-ap-text-block">
        				<div class="about-ap-text-block-svg"><img src="{{ asset('build/img/check-mark.png') }}"></div>
        				<div class="about-ap-text-block-text">
        					Комбинация оборудования, программного обеспечения и услуг позволяет розничным решениям поддерживать все виды деятельности по всем направлениям.
        				</div>
        			</div>
        			<div class="about-ap-text-block">
        				<div class="about-ap-text-block-svg"><img src="{{ asset('build/img/check-mark.png') }}"></div>
        				<div class="about-ap-text-block-text">
        					Авторизованные сервис центры в Алматы и Астане. Команда наших специалистов оказывает грамотную и квалифицированную помощь.
        				</div>
        			</div>    			
    		    </div>
    	    </div>
        </div>    	    
    </div>
</div>
<div class="inner-content-blocks">
    <div class="inner-content">
        <div class="inner">
            <div class="container">
        		<div class="about-ap-two">
        			<div class="about-ap-two-youtube">
                     			    
                      <video width="100%" height="300" controls="controls" poster="{{ asset('build/img/hqdefault.jpg') }}">
                       
                       <source src="{{ asset('build/img/video.mp4') }}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                       

                      </video>        				
        			</div>
        			<div class="about-ap-two-text">
    					<p>Наличие собственного завода по производству терминалов открывает возможности для выполнения проектов любого уровня сложности, а так же позволяет реализовывать инновационные решения, отвечающие запросам клиента и современным тенденциям развития рынка.</p>
    
    					<p>Наш завод оснащен современным комплексом металлообработки, позволяющим осуществлять полный цикл производства – от раскроя и резки металла до сборки и порошковой окраски.</p>
    
    					<p>Производство с нуля имеет неоспоримое преимущество – возможность создания продукта с учетом индивидуальных нужд и предпочтений клиента.</p>
    
    					<p>Cash Master имеет авторизованные сервис центры в Алматы и Астане.Команда наших специалистов производит диагностику и оказывает грамотную и квалифицированную помощь.</p>
    
    					<p>Мы стремимся оказывать высочайший уровень услуг сервисного обслуживания, поэтому у нас есть выездные «сервис-инженеры», которые в течение часа прибудут на место, чтобы диагностировать, и устранить неполадки, а так же проконсультировать вас по возникшим вопросам.</p>
        			</div>
        		</div>
        		<div class="about-ap-third">
        			<div class="about-ap-third-block">
        				<div class="about-ap-third-block-img">
        					<img src="{{ asset('build/img/idea1.png') }}">
        				</div>
        				<div class="about-ap-third-block-text">грамотные инженерные решения</div>
        			</div>
    				<div class="about-ap-third-block">
        				<div class="about-ap-third-block-img">
        					<img src="{{ asset('build/img/idea2.png') }}">
        				</div>
        				<div class="about-ap-third-block-text">квалифицированный опытный персонал</div>
        			</div>
        			<div class="about-ap-third-block">
        				<div class="about-ap-third-block-img">
        					<img src="{{ asset('build/img/idea3.png') }}">
        				</div>
        				<div class="about-ap-third-block-text">контроль качества на всех этапах производства</div>
        			</div>
        			<div class="about-ap-third-block">
        				<div class="about-ap-third-block-img">
        					<img src="{{ asset('build/img/idea4.png') }}">
        				</div>
        				<div class="about-ap-third-block-text">современное оборудование</div>
        			</div>
        			<div class="about-ap-third-block">
        				<div class="about-ap-third-block-img">
        					<img src="{{ asset('build/img/idea5.png') }}">
        				</div>
        				<div class="about-ap-third-block-text">использование надежных материалов</div>
        			</div>    			
        		</div>
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

<style>
.about-ab-slider div {
    padding: 0;
}
.about-ab-slider .item {
    height: auto;
}
.owl-carousel.owl-theme.about-slider.owl-loaded.owl-drag {
    margin-bottom: 23px;
}
</style>
<style>
    .about-ap-text-block-text.block-about-text2 {
        padding-top: 18px;
    }
    .about-ap-two-text p {
        font-size: 14px;
        line-height: 19px;
        padding-bottom: 13px;
    }
    .innet {
        width: 100%;
        float: left;
        background: #fff;
        margin-top: 40px;        
    }
    .about-ap-title {font-family: ProximaNova-Semibold;}
    .about-ap-text-block-text {font-family: ProximaNova-Semibold;}
    .about-ap-two-text {font-family: ProximaNova-Semibold;}
    .about-ap-third-block-text {font-family: ProximaNova-Semibold;}    
    .innt {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }
    .container {
        margin-top: 40px;
    }
	.about-ap-title {
	    text-align: center;
	    font-size: 32px;
	    margin-bottom: 20px;
	}
	.about-ap .container {
	    width: 80%;
	    margin: 0 auto;
	}
	.about-ap-text-block {
	    width: 28%;
	    display: flex;
	    margin-bottom: 43px;
	    justify-content: space-around;
	}
	.about-ap-text {
	    display: flex;
	    flex-wrap: wrap;
	    justify-content: space-around;
	}	

	.about-ap-text-block-svg {
	    width: 17%;
	    text-align: right;
	    padding-top: 16px;    
	}
	.about-ap-text-block-text {
	    width: 68%;
	    font-size: 12px;
	    line-height: 18px;
	}
	.about-ap-text-block {
	    box-shadow: 0 0 10px rgba(0,0,0,0.2);
	    padding: 30px 0;
	    border-radius: 15px;
	}	
	.about-ap-text-block-svg img {
	    width: 42px;
	}	



	.about-ap-two {
	    display: flex;
	    justify-content: space-between;
	}
	.about-ap-two-youtube {
	    width: 45%;
	}
	.about-ap-two-text {
	    width: 54%;
	}
	.about-ap-two-youtube img {
	    width: 100%;
	}
	.about-ap-third-block {width: 20%;text-align: center;font-size: 16px;line-height: 20px;}
	.about-ap-third {
	    display: flex;
	    margin: 40px 0;
    	flex-wrap: wrap;	    
	    justify-content: space-around;	
	}	
    .about-ap-third-block-img img {
        width: 44px;
    }	
    .about-ap-third-block-text {
        padding-top: 20px;
    }    
    /*slider*/
    .about-ab-slider.owl-nav.disabled {
        display: block !important;
    }    
    .about-ab-slider .owl-nav {
        width: 100% !important;
        top: 68%;
    }
    .about-ab-slider .owl-nav .owl-prev {
        margin-left: -50px;
    }
    .about-ab-slider .owl-nav .owl-next {
        margin-left: 103%;
    }
    /*slider*/
	@media (max-width:1400px) { 
	/*slider*/
    .about-ab-slider .owl-nav .owl-prev {
        margin-left: -25px;
    }
    .about-ab-slider .owl-nav .owl-next {
        margin-left: 101%;
    }
    /*slider*/   
	}   
	@media (max-width:1200px) { 
		.about-ap-text-block {
	    	width: 42%;
	    }
        .owl-carousel.owl-theme.about-slider.owl-loaded.owl-drag {
            margin-left: 30px;
        }	    
	}
	@media (max-width:900px) { 
        .owl-carousel.owl-theme.about-slider.owl-loaded.owl-drag {
            margin-left: 20px;
        }	    
        .about-ap-third-block {
            margin-bottom: 30px;
        }	    
		.about-ap-two {
		    flex-direction: column;
		}	 
		.about-ap-two-youtube,  .about-ap-two-text {
		    width: 100%;
		}		   
		.about-ap-third-block {
		    width: 35%;
		}	
        .about-ab-slider .owl-nav {
            display: none;
        }		
	}
	@media (max-width:700px) { 
		.about-ap-text-block {
	    	width: 45%;
	    }	
		.about-ap-two {
		    flex-direction: column;
		}	    
	}
	@media (max-width:700px) { 
		.about-ap-text-block {
	    	width: 90%;
	    }
        .owl-carousel.owl-theme.about-slider.owl-loaded.owl-drag {
            margin-left: 10px;
        }		    
	}
</style>
@endsection
