@extends('layouts.master')
@section('content')
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>Контакты</h1></div>
            <div class="services-inner" style="margin-top: 0;">
                <div class="tabs">
						<ul>
							<li>Алматы</li>
							<li>Нур-Султан</li>
							<li>Караганда</li>
						</ul>
						<div>
							 <div class="t1">
                                <div class="t1-1">
                                    <b>{{$contacts[0]->name}}</b><br>
                                    <span class="t1-adres">
                                            {!!$contacts[0]->description!!}
                                    </span>
                                    <span class="t1-phone">
                                         {{$contacts[0]->phone1}}{{--,<br>{{$contacts[0]->phone2}}<br>{{$contacts[0]->phone3}}<br>{{$contacts[0]->phone4}} --}}
                                    </span>
                                    <span class="t1-mail">
                                        {{$contacts[0]->email}}
                                    </span>
                                    <span><label class="rek" for="modal_1">Реквизиты компании</label></span>
                                    <!-- Modal PopUp -->
                                    <input class="modal_check" id="modal_1" type="checkbox" hidden>
                                    <div class="modal">
                                      <div class="modal_hold">
                                        <label class="modal_close" for="modal_1"></label>
                                        <h2>Товарищество с ограниченной ответственностью «Almaty Enterprising Company Ltd»  (Алматы Интерпрайзинг компани ЛТД)</h2>
                                      <p>БИН 120 240 024 800</p>
                                        <p>Юр.адрес: Республика Казахстан, город Алматы, район Медеуский, мкр.Алатау, ул. Ибрагимова, 9.</p>
                                        
                                        <p>сайт: www.cashmaster.kz</p>
                                        <p>тел:  8(727) 394 11 54</p>
                                        
                                        <p>Расчетный счет </p>
                                        <p>KZ989470398991325175 АО ДБ "Альфа -Банк" </p>
                                        <p>БИК ALFAKZKA</p>
                                        
                                        
                                        <p>Свидетельство  о постановке на учет по НДС</p>
                                        <p>Серия  60001        №0056647     дата выдачи   25.12.2015</p>
                                        <p>Дата постановки на учет по НДС        от  01.01.2016</p>
                                        <p>Директор Асанбаев Б.М.</p>
                                      </div>
                                      <!-- end .modal_hold -->
                                      <label class="modal_overlay" for="modal_1"></label>
                                    </div>
                                    <!-- end .modal --> 
                                    <!-- END Modal PopUp -->
                                    <style>
                                        /* Modal PopUp */
                                        label.rek {
                                            padding: 15px;
                                            border-radius: 17px;
                                            cursor: pointer;
                                        }
                                        label.popup_link{
                                          color:red;
                                          cursor:pointer;
                                          display:inline-block;
                                        }
                                        
                                        label.popup_link:hover{
                                          color:blue;
                                        }
                                        
                                        .modal_check{
                                          position:absolute;
                                          left:-10000px;
                                          opacity:0;
                                        }
                                        
                                        .modal{
                                          overflow:hidden;
                                          overflow-y:auto;
                                        }
                                        
                                        .modal,
                                        .modal .modal_overlay{
                                          position:absolute;
                                          top:0;
                                          left:0;
                                          right:0;
                                          bottom:0;
                                          z-index:-1000;
                                          opacity:0;
                                        }
                                        
                                        .modal .modal_overlay{
                                          background-color:#000;
                                          opacity:0.6;
                                        }
                                        
                                        .modal .modal_hold{
                                          width:500px;
                                          margin:100px auto 20px;
                                          padding:40px;
                                          border-radius:5px;
                                          background:#fff;
                                          -webkit-box-shadow: 0 0 40px 0 rgba(0,0,0,0.8);
                                        box-shadow: 0 0 40px 0 rgba(0,0,0,0.8);
                                          font-size:20px;
                                          text-align:center;
                                          position:relative;
                                          z-index:1001;
                                          -webkit-transform:translate(0, -100%);
                                          -ms-transform:translate(0, -100%);
                                          -o-transform:translate(0, -100%);
                                          transform:translate(0, -100%);
                                          -webkit-transition:-webkit-transform 0.4s ease-out;
                                          -moz-transition:-moz-transform 0.4s ease-out;
                                          -o-transition:-o-transform 0.4s ease-out;
                                          transition:transform 0.4s ease-out;
                                        }
                                        
                                        .modal_check:checked + .modal,
                                        .modal_check:checked + .modal .modal_overlay{
                                          z-index:1000;
                                          position:fixed;
                                          opacity:1;
                                        }
                                        
                                        .modal_check:checked + .modal .modal_hold{
                                          -webkit-transform:translate(0, 0);
                                          -ms-transform:translate(0, 0);
                                          -o-transform:translate(0, 0);
                                          transform:translate(0, 0);
                                        }
                                        
                                        .modal input{
                                          width:100%;
                                          margin-bottom:15px;
                                        }
                                        
                                        .modal .modal_close{
                                          width:40px;
                                          height:40px;
                                          border:2px solid #f00;
                                          border-radius:50%;
                                          position:absolute;
                                          top:5px;
                                          right:5px;
                                          cursor:pointer;
                                          display:block;
                                          -moz-transition-duration:0.3s;
                                          -webkit-transition-duration:0.3s;
                                          -o-transition-duration:0.3s;
                                          transition-duration:0.3s;
                                          -webkit-transform:rotate(45deg);
                                          -moz-transform:rotate(45deg);
                                          -o-transform:rotate(45deg);
                                          -ms-transform:rotate(45deg);
                                          transform:rotate(45deg);
                                        }
                                        
                                        .modal .modal_close:hover{
                                          width:50px;
                                          height:50px;
                                          -webkit-transform:rotate(315deg);
                                          -moz-transform:rotate(315deg);
                                          -o-transform:rotate(315deg);
                                          -ms-transform:rotate(315deg);
                                          transform:rotate(315deg);
                                        }
                                        
                                        .modal .modal_close:before,
                                        .modal .modal_close:after{
                                          content:'';
                                          display:block;
                                          background:#f00;
                                          position:absolute;
                                        }
                                        
                                        .modal .modal_close:before{
                                          height:2px;
                                          top:50%;
                                          left:5px;
                                          right:5px;
                                          -webkit-transform:translate(0, -50%);
                                          -moz-transform:translate(0, -50%);
                                          -o-transform:translate(0, -50%);
                                          -ms-transform:translate(0, -50%);
                                          transform:translate(0, -50%);
                                        }
                                        
                                        .modal .modal_close:after{
                                          width:2px;
                                          top:5px;
                                          bottom:5px;
                                          left:50%;
                                          -webkit-transform:translate(-50%, 0);
                                          -moz-transform:translate(-50%, 0);
                                          -o-transform:translate(-50%, 0);
                                          -ms-transform:translate(-50%, 0);
                                          transform:translate(-50%, 0);
                                        }
                                        
                                        .modal .modal_head{
                                          margin-bottom:20px;
                                        }
                                        
                                        .modal .modal_hold img{
                                          max-width:100%;
                                          height:auto;
                                        }
                                        
                                        /* End Modal PopUp */
                                    </style>

                                      
                                    <div style="display: none;" id="hidden-content-1">
                                      <h2>Товарищество с ограниченной ответственностью «Almaty Enterprising Company Ltd»  (Алматы Интерпрайзинг компани ЛТД)</h2>
                                      <p>БИН 120 240 024 800</p>
                                        <p>Юр.адрес: Республика Казахстан, город Алматы, район Медеуский, мкр.Алатау, ул. Ибрагимова, 9.</p>
                                        
                                        <p>сайт: www.cashmaster.kz</p>
                                        <p>тел:  8(727) 394 11 54</p>
                                        
                                        <p>Расчетный счет </p>
                                        <p>KZ989470398991325175 АО ДБ "Альфа -Банк" </p>
                                        <p>БИК ALFAKZKA</p>
                                        
                                        
                                        <p>Свидетельство  о постановке на учет по НДС</p>
                                        <p>Серия  60001        №0056647     дата выдачи   25.12.2015</p>
                                        <p>Дата постановки на учет по НДС        от  01.01.2016</p>
                                        <p>Директор Асанбаев Б.М.</p>
                                    </div>  
                                    <div class="trx"><a data-fancybox="gallery" href="{{ asset('build/img/office.jpg') }}"><div class="resk">Наш офис</div></a></div>
                                </div>
                                <div class="t1-2">
                                    {{--<img src={{ Storage::url($item->image) }} alt="{{ $contacts[0]->name }}" alt="Товар">--}}
                                    {!!$contacts[0]->maps!!}
                                </div>
                                <div class="personal">
                                    @foreach ($colleagues as $colleague)
                                        @if($colleague->title == !null)
                                            <div class="persona">
                        						<div class="persona-img" style="background:url({{ Storage::url($colleague->image) }}) center; background-size:cover;"></div>
                        						<div class="persona-name">
                        							<b>{{ $colleague->title }}</b><br>
                        							<i>{{ $colleague->position }}</i>
                        							<div>{{ $colleague->phone }}</div>
                        							<div>{{ $colleague->email }}</div>
                        							<div>{{ $colleague->skype }}</div>    
                        						</div>
                        					</div>
                        				@else
                        				    
                        				@endif
                        				@break($colleague->id == 12)
                					@endforeach
                				</div>                               
                            </div>
							<div class="t1">
								<div class="t1-1">
                                    <b>{{$contacts[1]->name}}</b><br>
                                    <span class="t1-adres">
                                            {!!$contacts[1]->description!!}
                                    </span>
                                    <span class="t1-phone">
                                        {{$contacts[1]->phone1}},<br>{{$contacts[1]->phone2}}<br>{{$contacts[1]->phone3}}<br>{{$contacts[1]->phone4}}
                                    </span>
                                    <span class="t1-mail">
                                        {{$contacts[1]->email}}
                                    </span>
                                    <span><label class="rek" for="modal_2">Реквизиты компании</label></span>
                                    <!-- Modal PopUp -->
                                    <input class="modal_check" id="modal_2" type="checkbox" hidden>
                                    <div class="modal">
                                      <div class="modal_hold">
                                        <label class="modal_close" for="modal_2"></label>
                                        <h2>Товарищество с ограниченной ответственностью «Almaty Enterprising Company Ltd»  (Алматы Интерпрайзинг компани ЛТД)</h2>
                                      <p>БИН 120 240 024 800</p>
                                        <p>Юр.адрес: Республика Казахстан, город Алматы, район Медеуский, мкр.Алатау, ул. Ибрагимова, 9.</p>
                                        
                                        <p>сайт: www.cashmaster.kz</p>
                                        <p>тел:  8(727) 394 11 54</p>
                                        
                                        <p>Расчетный счет </p>
                                        <p>KZ989470398991325175 АО ДБ "Альфа -Банк" </p>
                                        <p>БИК ALFAKZKA</p>
                                        
                                        
                                        <p>Свидетельство  о постановке на учет по НДС</p>
                                        <p>Серия  60001        №0056647     дата выдачи   25.12.2015</p>
                                        <p>Дата постановки на учет по НДС        от  01.01.2016</p>
                                        <p>Директор Асанбаев Б.М.</p>
                                      </div>
                                      <!-- end .modal_hold -->
                                      <label class="modal_overlay" for="modal_2"></label>
                                    </div>
                                      
                                    <div style="display: none;" id="hidden-content-1">
                                      <h2>Товарищество с ограниченной ответственностью «Almaty Enterprising Company Ltd»  (Алматы Интерпрайзинг компани ЛТД)</h2>
                                      <p>БИН 120 240 024 800</p>
                                        <p>Юр.адрес: Республика Казахстан, город Алматы, район Медеуский, мкр.Алатау, ул. Ибрагимова, 9.</p>
                                        
                                        <p>сайт: www.cashmaster.kz</p>
                                        <p>тел:  8(727) 394 11 54</p>
                                        
                                        <p>Расчетный счет </p>
                                        <p>KZ989470398991325175 АО ДБ "Альфа -Банк" </p>
                                        <p>БИК ALFAKZKA</p>
                                        
                                        
                                        <p>Свидетельство  о постановке на учет по НДС</p>
                                        <p>Серия  60001        №0056647     дата выдачи   25.12.2015</p>
                                        <p>Дата постановки на учет по НДС        от  01.01.2016</p>
                                        <p>Директор Асанбаев Б.М.</p>
                                    </div>                                    
                                </div>
								<div class="t1-2">
									{!!$contacts[1]->maps!!}
								</div>
								<div class="personal">
                					@foreach ($colleagues as $colleague)
                					    @continue($colleague->id <= 12)
                                            @if($colleague->title == !null)
                                                <div class="persona">
                            						<div class="persona-img" style="background:url({{ Storage::url($colleague->image) }}) center; background-size:cover;"></div>
                            						<div class="persona-name">
                            							<b>{{ $colleague->title }}</b><br>
                            							<i>{{ $colleague->position }}</i>
                            							<div>{{ $colleague->phone }}</div>
                            							<div>{{ $colleague->email }}</div>
                            							<div>{{ $colleague->skype }}</div>                            							
                            						</div>
                            					</div>
                            				@else
                            				    
                            				@endif
                        				@break($colleague->id == 14)
                					@endforeach
                				</div>
							</div>
							<div class="t1">
								<div class="t1-1">
                                    <b>{{$contacts[2]->name}}</b><br>
                                    <span class="t1-adres">
                                            {!!$contacts[2]->description!!}
                                    </span>
                                    <span class="t1-phone">
                                        {{$contacts[2]->phone1}},<br>{{$contacts[2]->phone2}}<br>{{$contacts[2]->phone3}}<br>{{$contacts[2]->phone4}}
                                    </span>
                                    <span class="t1-mail">
                                        {{$contacts[2]->email}}
                                    </span>
                                    <span><label class="rek" for="modal_3">Реквизиты компании</label></span>
                                    <!-- Modal PopUp -->
                                    <input class="modal_check" id="modal_3" type="checkbox" hidden>
                                    <div class="modal">
                                      <div class="modal_hold">
                                        <label class="modal_close" for="modal_3"></label>
                                        <h2>Товарищество с ограниченной ответственностью «Almaty Enterprising Company Ltd»  (Алматы Интерпрайзинг компани ЛТД)</h2>
                                      <p>БИН 120 240 024 800</p>
                                        <p>Юр.адрес: Республика Казахстан, город Алматы, район Медеуский, мкр.Алатау, ул. Ибрагимова, 9.</p>
                                        
                                        <p>сайт: www.cashmaster.kz</p>
                                        <p>тел:  8(727) 394 11 54</p>
                                        
                                        <p>Расчетный счет </p>
                                        <p>KZ989470398991325175 АО ДБ "Альфа -Банк" </p>
                                        <p>БИК ALFAKZKA</p>
                                        
                                        
                                        <p>Свидетельство  о постановке на учет по НДС</p>
                                        <p>Серия  60001        №0056647     дата выдачи   25.12.2015</p>
                                        <p>Дата постановки на учет по НДС        от  01.01.2016</p>
                                        <p>Директор Асанбаев Б.М.</p>
                                      </div>
                                      <!-- end .modal_hold -->
                                      <label class="modal_overlay" for="modal_3"></label>
                                    </div>
                                      
                                    <div style="display: none;" id="hidden-content-1">
                                      <h2>Товарищество с ограниченной ответственностью «Almaty Enterprising Company Ltd»  (Алматы Интерпрайзинг компани ЛТД)</h2>
                                      <p>БИН 120 240 024 800</p>
                                        <p>Юр.адрес: Республика Казахстан, город Алматы, район Медеуский, мкр.Алатау, ул. Ибрагимова, 9.</p>
                                        
                                        <p>сайт: www.cashmaster.kz</p>
                                        <p>тел:  8(727) 394 11 54</p>
                                        
                                        <p>Расчетный счет </p>
                                        <p>KZ989470398991325175 АО ДБ "Альфа -Банк" </p>
                                        <p>БИК ALFAKZKA</p>
                                        
                                        
                                        <p>Свидетельство  о постановке на учет по НДС</p>
                                        <p>Серия  60001        №0056647     дата выдачи   25.12.2015</p>
                                        <p>Дата постановки на учет по НДС        от  01.01.2016</p>
                                        <p>Директор Асанбаев Б.М.</p>
                                    </div>                                    
                                </div>
								<div class="t1-2">
									{!!$contacts[2]->maps!!}
								</div>
								<div class="personal">
                					@foreach ($colleagues as $colleague)
                					    @continue($colleague->id <= 24)
                                            @if($colleague->title == !null)
                                                <div class="persona">
                            						<div class="persona-img" style="background:url({{ Storage::url($colleague->image) }}) center; background-size:cover;"></div>
                            						<div class="persona-name">
                            							<b>{{ $colleague->title }}</b><br>
                            							<i>{{ $colleague->position }}</i>
                            							<div>{{ $colleague->phone }}</div>
                            							<div>{{ $colleague->email }}</div>
                            							<div>{{ $colleague->skype }}</div>
                            						</div>
                            					</div>
                            				@else
                            				    
                            				@endif
                        				
                					@endforeach
                				</div>
							</div>
						</div>
					</div>
                
                <div class="cont-form">
                    <div class="inner-zag"><h1>Пишите нам</h1></div>
                    <form action="/contactsform" method="POST" class="form-d">
                        @csrf
                        <div class="cont-col">
                            <input type="text" name="name" placeholder="Ваше имя" required=""><Br>
                            <select name="tech">
                                <option selected>Техническая поддержка</option>
                                <option>Информационная поддержка</option>
                            </select><br>
                            <button type="submit" class="send">Отправить</button>
                        </div>
                        <div class="cont-col2">
                            <input type="text" name="phone" id="phone" placeholder="Ваш телефон/почта" required=""><br>
                            <textarea type="" name="email" placeholder="Ваше сообщение"></textarea>
                        </div>
                    </form>
                    <form action="/contactsform" method="POST" class="form-m">
                        @csrf
                        <input type="text" name="name" placeholder="Ваше имя" required=""><Br>
                        <input type="text" name="phone" id="phone" placeholder="Ваш телефон/почта" required=""><br>
                        <select name="tech">
                            <option selected>Техническая поддержка</option>
                            <option>Информационная поддержка</option>
                        </select><br>
                        <textarea type="text" name="email" placeholder="Ваше сообщение"></textarea><Br>
                        <button type="submit" class="send">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
