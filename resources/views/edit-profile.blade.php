@extends('layouts.master')
@section('content')
<div class="inner-content-block">
		<div class="inner-content">
			<div class="inner">
				<div class="tovary-col1">
					<a href="/index" class="il il1"><img src="{{ asset('build/img/profile.svg') }}"> Личные данные</a>
					<a href="/index/history" class="il il2"><img src="{{ asset('build/img/list.svg') }}"> История заказов</a>
					<a href="/index/{{ Auth::user()->id }}/edit" class="il il2"><img src="{{ asset('build/img/edit.svg') }}"> Редактировать профиль</a>
					{{-- <a href="lk.html" class="il il3"><img src="{{ asset('build/img/logout.svg') }}"> Выйти</a> --}}
					<a class="il il3" href="{{ route('logout') }}"
								onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
								<img src="{{ asset('build/img/logout.svg') }}">Выйти {{-- {{ __('Logout') }} --}}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
				</div>
				<div class="tovary-col2">
					<div class="inner-zag2">
						<h1>Редактор профиля</h1>
						<div class="inner-bread">
							<div class="b1">
								<a href="index.html">Главная</a>  »
								<a href="#">Кабинет</a>  »
								Редактор профиля
							</div>
						</div>
						<div class="lk-block">
							<div class="lk-menu">
									<a href="/index" class="il il1 il-active"><img src="{{ asset('build/img/profile.svg') }}"> Личные данные</a>
									<a href="/index/history" class="il il2"><img src="{{ asset('build/img/list.svg') }}"> История заказов</a>
									<a href="/index/{{ Auth::user()->id }}/edit" class="il il2"><img src="{{ asset('build/img/edit.svg') }}"> Редактировать профиль</a>
									{{-- <a href="lk.html" class="il il3"><img src="{{ asset('build/img/logout.svg') }}"> Выйти</a> --}}
									<a class="il il3" href="{{ route('logout') }}"
										onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
										<img src="{{ asset('build/img/logout.svg') }}">Выйти {{-- {{ __('Logout') }} --}}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
							</div>
							<table class="lk-form">
									<form action="{{ route('index.update', $collection->id) }}" method="POST">
											@method('PATCH')
											@csrf
								<tr>
									<td>
										Личные данные<br>



										<input class="form-control" type="text" value="{{ $collection->name }}" id="username" name="username"><Br>
										<input type="text" placeholder="Телефон" value="{{ $collection->phone }}" id="phone" name="phone"><Br>
										<input type="text" placeholder="Почта" value="{{ $collection->email }}" id="email" name="email"><Br>
                                    </td>
                                    {{--  @if (Auth::check())
                                        @if (Auth::user()->hasRole('entity'))
                                        <td>
                                            Данные организации<br>
                                            <input type="text" placeholder="Наименование"><Br>
                                            <input type="text" placeholder="ИИН/БИН"><Br>
                                            <input type="text" placeholder="Юридический адрес"><Br>
                                        </td>
                                        @endif
                                        @endif  --}}
									<td>
										Смена пароля<br>

										<input type="password" placeholder="Старый пароль" name="old_password"><Br>
										<input type="password" placeholder="Новый пароль" name="password"><Br>
										<input type="password" placeholder="Повторите новый пароль" name="repeat_password"><Br>
									</td>
								</tr>
								@if (Auth::check())
                            		@if (Auth::user()->hasRole('entity'))
								<tr>
									<td>
										Данные организации<br>

										<input type="text" name="companyname" placeholder="Наименование" value="{{ $collection->companyname }}"><Br>
										<input type="text" name="innbin" placeholder="ИИН/БИН" value="{{ $collection->innbin }}"><Br>
										<input type="text" name="address" placeholder="Юридический адрес" value="{{ $collection->address }}"><Br>
									</td>
								</tr>
									@endif
								@endif	
								<tr>
									<td style="padding-top: 0;" colspan="2"><button type="submit" class="save">Обновить</button></td>
								</tr>
							</form>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
