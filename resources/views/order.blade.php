@extends('layouts.master')
@section('content')
{{-- <div class="inner-content-block">
    <div class="inner-content">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="form-order">
            <form action="/order" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Имя" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="address" placeholder="Адрес" required>
                </div>
                <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                    </div>
                <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                @if(Auth::check())
                    <div class="form-group">
                        <input type="text" class="form-control" name="userid" value="{{ Auth::user()->id }}"
                        required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="staticprice" value="@foreach($products as $product){{ $product['item']['entityprice']* $currency[0]->coefficient  }}@endforeach"
                        required>
                    </div>
                @else
                    <div class="form-group">
                        <input type="text" class="form-control" name="userid" value="0"
                        required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="staticprice" value="@foreach($products as $product){{ $product['item']['individualprice']* $currency[0]->coefficient  }}@endforeach"
                        required>
                    </div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>

            </form>
        </div>
        {{ dd(test) }}
        <div>Заказ на сумму: {{ number_format(session()->get('cart')->totalPrice, 0, ',', ' ')* $currency[0]->coefficient }} тг</div>
    </div>
</div>            --}}
@if(session()->has('cart'))
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>Оформление заказа</h1></div>
            <div class="of">
                <form action="/order" method="post" id="store">
                    @csrf
                    <div class="of-row1">
                        @if(Auth::check())
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                            <input type="text" class="form-control phone-mask" name="phone" value="{{ Auth::user()->phone }}" required>
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                        @else 
                            <input type="text" class="form-control" name="name" placeholder="Введите имя" required>
                            <input type="text" class="form-control phone-mask" name="phone" placeholder = "Введите телефон" required>
                            <input type="email" class="form-control" name="email" placeholder = "Введите email" required>
                        @endif
                        <input type="text" name="city" placeholder="Населенный пункт" required=""><Br>
                        @if(Auth::check())
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="userid" value="{{ Auth::user()->id }}"
                            required>
                            <input type="hidden" class="form-control" name="name_tov" value="@foreach($products as $product)@if(count($product) < 2){{$product['item']['name']}}@else{{$product['item']['name']}}@endif|@endforeach"
                            required>
                            <input type="hidden" class="form-control" name="amount" value="@foreach($products as $product)@if(count($product) < 2){{$product['qty']}}@else{{$product['qty']}}@endif|@endforeach"
                            required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="address" value="{{ number_format(session()->get('cart')->totalPrice, 0, ',', '')* $currency[0]->coefficient }}"
                            required>
                        </div>
                        @else
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="userid" value="0" required>
                            {{--  @foreach($products as $product)<input type="text" class="form-control" name="name_tov" value="{{ $product['item']['name'] . " "  }}" required>@endforeach  --}}
                            <input type="hidden" class="form-control" name="name_tov" value="@foreach($products as $product)@if(count($product) < 2){{$product['item']['name']}}@else{{$product['item']['name']}}@endif|@endforeach"
                            required>
                            <input type="hidden" class="form-control" name="amount" value="{{ $product['qty'] }}" required>
                        </div>
                        <div class="form-group">
                            {{--<input type="text" class="form-control" name="address" value="{{ number_format(session()->get('cart')->totalPrice * $currency[0]->coefficient) }}" required>--}}
                            @if(Auth::check())
								@if(Auth::user()->hasRole('entity'))
									<input type="text" class="form-control" name="address" value="{{ $product['item']['entityprice']* $currency[0]->coefficient }}" required>test
								@else
									<input type="text" class="form-control" name="address" value="{{ $product['item']['individualprice']* $currency[0]->coefficient }}" required>
								@endif
							@else

							    @foreach($products as $product)<input type="hidden" class="form-control" name="address" value="{{ $product['item']['individualprice']* $currency[0]->coefficient }}" required>@endforeach
							@endif
                        </div>
                        @endif
                    </div>
                    <div class="of-row2">
                        <div>
                            <span>Способ доставки</span>
                            <select id="CategoryTrees"  name="post" class="sss">
                            <option selected="selected" title="#" value="10"> &nbsp; &nbsp;Доставка курьером </option>
                            <option title="#" value="20">&nbsp; &nbsp;Самовывоз</option>
                            </select>

                        </div>


                             <div id="blokone" style="display:block">
                                 <span>Адрес доставки</span>
                            <input type="text" name="address_user" placeholder="Улица, дом, квартира" value="Улица, дом, квартира">
                             </div>

                            <script>
                            document.getElementById("CategoryTrees")
                                .onchange = function () {
                                    var b = {
                                        10: "blokone",
                                        20: "bloktwo",
                                        30: "blokthree"
                                    }, c = this.value,
                                        a;
                                    for (a in b) document.getElementById(b[a])
                                        .style.display = 0 == c || c == a ? "block" : "none"
                            };
                            </script>



                        <div>
                            <span>Способ оплаты</span>
                            <select class="sss" name="payment">
                                <option value="/order" selected="">Наличными</option>
                                <option value="/paybox">Банковской картой</option>
                                <option value="/qiwi">QIWI-терминал</option>
                                <option value="/qiwiwalet">QIWI-кошелёк</option>
                            </select>
                        </div>
<style>
        button.send.send-post {
            float: right;
        }
        a.back-post {
            padding: 17px;
            font-family: ProximaNova-Bold;
            background: #A7A7A7;
            color: #fff;
            cursor: pointer;
            font-size: 15px;
            border-radius: 8px;
            transition: all 0.3s ease-out;
            border: 0;
            text-decoration: none;
        }
        button.send.send-post {
            height: 53px;
            width: 228px !important;
        }
</style>
                        <div class="car-mainorder">
                            <span><a href="/cart" class="back-post">Вернуться в корзину</a></span>
                            <button type="submit" class="send send-post">Отправить</button>
                        </div>
                    </div>
                </form>
                <script type="text/javascript">
            		document.getElementById('store').payment.onchange = function() {
                    var newaction = this.value;
                    document.getElementById('store').action = newaction;};
            	</script>                  
                <div class="of-row3">
                        <div class="of1">

                                Итоговая стоимость<br>
                                <h2>{{ number_format(session()->get('cart')->totalPrice, 0, ',', '') }}</h2>



                            {{-- Итоговая стоимость<br>
                            <h2>1 275 000</h2>
                            <a href="#" class="zak-of">Оформить заказ</a> --}}

                        </div>

                        <a href="/postprice" class="post-price">Доставка и оплата</a><br><br><br>
                        Принимаем к оплате<br>
                        <img src="{{ asset('build/img/visa.svg') }}" alt="Виза">
                        <img src="{{ asset('build/img/mastercard.svg') }}" alt="Мастеркард">

                    </div>
            </div>
        </div>
    </div>
</div>
@else 
<div>tester</div>
@endif
@endsection
