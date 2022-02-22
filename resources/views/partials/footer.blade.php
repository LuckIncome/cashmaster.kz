<div class="footer-block">
    <div class="foot1">
        <div class="foot1-1">
            <span>+7 (727) 392-31-95</span>
            <span>+7 (701) 029-26-80</span>
            <span>+7 (701) 959-65-71</span>
        </div>
    </div>
    <div class="foot1">
        <div class="foot1-2">
            <span><a href="/contacts">Все контакты</a></span>
            <span>

<button class="zvonok modalButton" data-popup="popupOne2" style="border:0;">Заказать звонок</button>
            <section class="modal modalWindow" id="popupOne2">  
            	<section class="modalWrapper">
            	<h2 style="text-align:center;">Онлайн заявка</h2>    
               <form action="/modal" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Ваше имя" required>
                    <input type="text" name="phone" placeholder="Ваш телефон" required class="phone-mask">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            		
            	</section>
                            	
            	<a class="closeBtn">X</a>
            </section>

            
            </span>
            <span>
                <a rel="nofollow" href="https://www.instagram.com/cashmaster.kz"><img src="{{ asset('build/img/inst.svg') }}" alt="Инстаграм"></a>
                <a rel="nofollow" href="https://api.whatsapp.com/send?phone=77010292680" target="_blank"><img src="{{ asset('build/img/whatsapp.svg') }}" alt="whatsupp"></a>
                {{--<a href="#"><img src="{{ asset('build/img/fb.svg') }}" alt="Фэйсбук"></a>--}}
            </span>
        </div>
    </div>
    <div class="foot2 us">
        <div class="foot2-1">
            <div class="foot2-2">
                <span>
                    <b>Банковские терминалы</b><br>
                    <ul>
                        <li><a href="/project">Наши проекты</a></li>
                        {{--<li><a href="/catalog">Оборудование</a></li>--}}
                    </ul>
                </span>
                <span>
                    <b>Платежные терминалы</b><br>
                    <ul>
                        <li><a href="/catalog/Post">Терминалы</a></li>
                        <li><a href="/business">Бизнес план</a></li>
                        {{--<li><a href="/connect">Подключение</a></li>--}}
                    </ul>
                </span>
                <span>
                    <b>Запчасти и комплектующие</b><br>
                    <ul>
                        <li><a href="/catalog/zapasnie">Запасные части</a></li>
                        <li><a href="/catalog/Komplektuyushchie">Комплектующие</a></li>
                    </ul>
                </span>
                <span>
                    <b>Сервисное обслуживание</b><br>
                    <ul>
                        <li><a href="/contacts">Контакты</a></li>
                        {{--<li><a href="/maintenance">Обслуживание</a></li>--}}
                        <li><a href="/service">Обслуживание</a></li>
                    </ul>
                </span>
            </div>
        </div>
    </div>
    <div class="foot2">
        <div class="foot2-1">
            <div class="foot2-2">
                @foreach ($contacts as $contact)
                    <span class="city">
                        <b>{{$contact->name}}</b><br>
                        {!!$contact->description!!}<br>
                        Тел: {{$contact->phone1}}<br>
                        <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                    </span>
                @endforeach
                
                <span class="imar">
                    <br>
                    © 2009–2019 CashMaster<br><br>
                    
                </span>
            </div>
        </div>
    </div>
    <div class="mobile-w">
        <a rel="nofollow" href="https://api.whatsapp.com/send?phone=77010292680" target="_blank"><img src="{{ asset('build/img/whatsapp-mob.svg') }}" alt="whatsupp"></a>
    </div>
</div>

 <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(38704700, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/38704700" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
