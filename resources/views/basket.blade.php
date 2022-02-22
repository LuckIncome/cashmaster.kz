@extends('layouts.master')
@section('title', $seo[11]->title ?? $seo[11]->Name)
@section('description', $seo[11]->description ?? $seo[11]->Name)
@section('keywords', $seo[11]->keywords ?? $seo[11]->Name)
@section('content')
{{-- <div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<ul class="list-group">
					@if(session()->has('cart'))
					@foreach($products as $product)
					<li class="list-group-item">
						<span class="badge">{{ $product['item']['entityprice'].' * '.$product['qty'] }}</span>
						<strong>{{ $product['item']['title'] }}</strong>
						<span class="label label-success">{{ $product['item']['entityprice'] }}<img src="{{ Storage::url($product['item']['image']) }}" alt=""></span>
						<div class="btn-group">
							{{-- <a href="{{ route('cart.remove', $product['item']['id']) }}" class="btn btn-danger">X</a> --}}
						{{-- </div>
					</li>
					@endforeach
					<strong>Total: {{ number_format(session()->get('cart')->totalPrice, 0, ',', ' ') }} тг</strong>
					<a href="/order" class="btn btn-primary">Оформить заказ</a>
					@else
					<p>Cart is empty!</p>
					@endif
				</ul>
			</div>
		</div>
	</div> --}}

<div class="inner-content-block">
	<div class="inner-content">
		<div class="inner">
			<div class="inner-zag"><h1>Корзина</h1></div>
			<div class="of">
				<div class="of-row4">

						@if(session()->has('cart'))
						@foreach($products as $product)
						<div class="tov-list">
								<a href="#">
									<div class="tov-list-img">
										<table>
											<tr>
												<td>
													<img src="{{ Storage::url($product['item']['image']) }}" alt="">
												</td>
											</tr>
										</table>
									</div>
								</a>

							<div class="tov-list-name">
								<table>
									<tr>
										<td>
											<a href="#">{{ $product['item']['name'] }}</a>
										</td>
									</tr>
								</table>
							</div>
							{{-- <div>{{ $product['item']['entityprice'] }}</div> --}}
							<div class="badge"></div>
							<div class="tov-list-colvo">
								<div class="quantity-block">
									{{-- <button class="quantity-arrow-minus"></button> --}}
									<a href="{{ route('cart.redis', $product['item']['id']) }}" class="quantity-arrow-minus"></a>
									{{ $product['qty'] }}
									<a href="{{ route('cart.add2', $product['item']['id']) }}" class="quantity-arrow-plus"></a>
									{{-- <button class="quantity-arrow-plus"></button> --}}
								</div>
							</div>
							<div class="tov-list-cena">
							    @if($product['item']['valut'] == 1)
    								@if(Auth::check())
    
    									@if(Auth::user()->hasRole('entity'))
    										{{ $product['item']['entityprice']* $currency[0]->coefficient }}
    									@else
    										{{ $product['item']['individualprice']* $currency[0]->coefficient }}
    									@endif
    								@else
    								    {{ $product['item']['individualprice']* $currency[0]->coefficient }}
    								@endif
								<!--@if(Auth::user())-->
								<!--	{{ $product['item']['individualprice']* $currency[0]->coefficient }}-->
								<!--@endif-->
                                @else
                                    @if(Auth::check())
    
    									@if(Auth::user()->hasRole('entity'))
    										{{ $product['item']['entityprice'] }}
    									@else
    										{{ $product['item']['individualprice'] }}
    									@endif
    								@else
    								    {{ $product['item']['individualprice'] }}
    								@endif
                                @endif
							</div>
							<a href="{{ route('cart.remove', $product['item']['id']) }}" class="btn btn-danger"><div class="tov-delete"></div></a>
							<div>{{ $product['item']['title'] }}</div>

							<div class="btn-group">
								{{-- <a href="{{ route('cart.remove', $product['item']['id']) }}" class="btn btn-danger">X</a> --}}
							</div>
						</div>
						@endforeach


					{{-- <div class="tov-list">
						<a href="#">
							<div class="tov-list-img">
								<table>
									<tr>
										<td>
											<img src="{{ asset('build/img/tovar.png') }}" alt="Товар">
										</td>
									</tr>
								</table>
							</div>
						</a>
						<div class="tov-list-name">
							<table>
								<tr>
									<td>
										<a href="#">Платежный терминал Настенный (Улица)</a>
									</td>
								</tr>
							</table>
						</div>
						<div class="tov-list-colvo">
							<div class="quantity-block">
								<button class="quantity-arrow-minus"></button>
								<input class="quantity-num" type="number" value="1" />
								<button class="quantity-arrow-plus"></button>
							</div>
						</div>
						<div class="tov-list-cena">
							425 000 тг
						</div>
						<div class="tov-delete"></div>
					</div> --}}
				</div>
				<div class="of-row3">
					<div class="of1">

							Итоговая стоимость<br>
							<h2>{{ number_format(session()->get('cart')->totalPrice, 0, ',', ' ') }}</h2>
							
							@if (number_format(session()->get('cart')->totalPrice, 0, ',', ' ') == 0)
								нету ничего
							@else
								<a href="/order" class="zak-of">Оформить заказ</a>
							@endif

							{{-- <a href="/order" class="zak-of">Оформить заказ</a> --}}

                            @else
							<div class="of1">
                                <h2>В корзине пока товаров нет.</h2></div>
							@endif

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
@endsection
