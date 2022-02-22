<div class="head1">
    <div class="head1-1">
        <div class="head1-2">
            <a href="/" class="logo"><img src="{{ asset('build/img/logo.svg') }}" alt="Логотип"></a>
            <a href="/contacts" class="map">Как доехать?</a>
            {{--<a href="#" class="location"></a>--}}
            <span class="grafic">Пн-Пт 09:00 — 19:00, Сб 10:00 — 14:00</span>
            <b><a href="tel:{{$contacts[0]->phone1}}">{{$contacts[0]->phone1}}</a></b>
            <div class="head1-2-2">
                <div class="search">
                    <form method="GET" action="{{ route('cart.search') }}">
                        <input type="text" name="q" placeholder="Найти ...">
                        <input type="submit" name="sear" class="sear">
                        {{-- <button type="submit">Search</button> --}}
                    </form>
                </div>
                <a rel="nofollow" href="/cart"><img src="{{ asset('build/img/cart.svg') }}" alt="Корзина"><span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : 0 }}</span></a>
                <a rel="nofollow" href="/index"><img src="{{ asset('build/img/profile.svg') }}" alt="Профиль"></a>
            </div>
        </div>
    </div>
</div>
<div class="head2">
    <div class="head2-1">
        <div class="head2-2">
            <ul class="menu">
                <li><a href="/about">О компании</a></li>
                <li>
                    <a href="/catalog" class="cat">Каталог</a>
                    <ul>
                        @foreach ($categories as $item)
                            
                            <li>
								<a href="{{ route('category.index2', $item) }}">
									<div class="ca" style="background: url({{ Storage::url($item->image) }}) center right no-repeat;"></div>
									{{$item->name}}
								</a>
							</li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="/service">Услуги</a></li>
                <li><a href="/article">Полезная информация</a></li>
                <li><a href="/contacts">Контакты</a></li>
            </ul>
            <a href="#" class="menu-m" onclick="openbox('box'); return false"></a>
            <div id="box" class="menu-m3" style="display: none;">
                <div class="hide" onclick="openbox('box'); return false"></div>
                <div class="box1">
                    <ul class="box1-1">
                            <li><div class="search">
                                    <form method="GET" action="{{ route('cart.search') }}">
                                        <input type="text" name="q" placeholder="Найти ...">
                                        <input type="submit" name="sear" class="sear">
                                        {{-- <button type="submit">Search</button> --}}
                                    </form>
                                </div></li>
                        @foreach ($categories as $item)
                            <li><a href="{{ route('category.index2', $item) }}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="box1">
                    <ul class="box1-2">
                        <li><a href="/about">О компании</a></li>
                        <li><a href="/catalog">Каталог</a></li>
                        <li><a href="/service">Услуги</a></li>
                        <li><a href="/article">Полезная информация</a></li>
                        <li><a href="/contacts">Контакты</a></li>
                    </ul>
                </div>
            </div>
            
            <a href="#" class="zakaz modalButton" data-popup="popupOne">Онлайн заявка</a>
            
            
            <a href="#" class="map2">Как доехать?</a>
            <span class="grafic2">Пн-Пт 09:00 — 19:00, Сб 10:00 — 14:00</span>
            <a href="/"><img src="{{ asset('build/img/logo.svg') }}" class="logo-m" alt="Логотип"></a>
            <div class="head2-2-2">
                {{--<a href="#"><img src="{{ asset('build/img/search.svg') }}" alt="Поиск"></a>--}}
                <a rel="nofollow" href="/cart"><img src="{{ asset('build/img/cart.svg') }}" class="basket-mob" alt="Корзина"><span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : 0 }}</span></a>
                <a rel="nofollow" href="/index"><img src="{{ asset('build/img/profile.svg') }}" alt="Профиль"></a>
            </div>
            <section class="modal modalWindow" id="popupOne">  
            	<section class="modalWrapper">
            	<h2 style="text-align:center;">Онлайн заявка</h2>    
               <form action="/modal" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Ваше имя" required>
                    <input type="text" name="phone" placeholder="Ваш телефон" required class="phone-mask">
                    <input type="text" name="email" placeholder="Ваша почта" required>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            		
            	</section>
            	<a class="closeBtn">X</a>
            </section>
            <section class="modal overlay"></div>
        </div>
    </div>
</div>
