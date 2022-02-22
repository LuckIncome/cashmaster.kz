@extends('layouts.administrator')

@section('content')
<!-- Start content -->
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <div class="row align-items-center">
                  <div class="col-md-8">
                     <h4 class="page-title mb-0">Отчет</h4>
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Отчет</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end row -->
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                    <h4 class="mt-0 header-title">Список отчетов</h4>
                    <p class="text-muted m-b-30 font-14">Содержит список отчетов.</p>
                    <!--<a href="/export2"><div class="export">Экспортировать историю товаров</div></a>-->
                    <div style="display:flex; justify-content: space-between;">
                        <form method="GET" action="{{ route('export2') }}"  enctype="multipart/form-data">
                        @csrf
                            <input type="date" name="dateStart">
                            <input type="date" name="dateFinish">
                            <button type="submit" class="btn btn-primary waves-effect">Экспортировать</button>
                        </form>               
                        <form method="GET" action="{{ route('searchdate') }}"  enctype="multipart/form-data">
                        @csrf
                            <input type="date" name="dateStartSearch">
                            <input type="date" name="dateFinishSearch">
                            <button type="submit" class="btn btn-primary waves-effect">Искать</button>
                        </form>                       
                    </div>
                    <p class="text-muted m-b-15">
                        {{-- <a href="{{ route('currency.create') }}"><button class="btn btn-primary btn-sm waves-effect">Создать пользователя</button></a>  --}}
                    </p>
                  <table class="table table-bordered mb-0">
                     <thead>
                        <tr>
                           <th>#</th>
                           {{-- <th>Отображаемое имя</th> --}}
                           {{-- <th>Текст</th> --}}
                           <th>Заказчик</th>
                           <th>Описание</th>
                           <th>Телефон</th>
                           <th>Почта</th> 
                           <th>Город</th>
                           <th>Адрес</th>
                           <th>Сумма</th> 
                           <th>Способ оплаты</th>
                           <th>Статус</th>                           
                           <th>Дата</th>
                           <th>Количество</th>
                           <th>Товары</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach ($reports as $item)
                        <tr>
                           <td>{{ $item->id }}</td>
                           <td>{{ $item->name }}</td>
                           <td>{{ $item->description }}</td> 
                           <td>{{ $item->phone }}</td>
                           <td>{{ $item->email }}</td>
                           <td>{{ $item->city }}</td>
                           <td>{{ $item->address }}</td>
                           <td>{{ $item->totalprice }}</td>
                           <td>{{ $item->paymenttype }}</td>
                           <td>{{ $item->status }}</td>
                           <td>{{ $item->created_at }}</td>
                           <td>
                                <a data-fancybox data-src="#hidden-content-{{ $item->id }}" href="javascript:;" class="btn">Открыть</a>
                                <div style="display: none;" id="hidden-content-{{ $item->id }}">
                                    <table class="table table-bordered mb-0">
                                    <thead>
                                    <tr>
                                       <th>#</th>
                                       {{-- <th>Отображаемое имя</th> --}}
                                       {{-- <th>Текст</th> --}}
                                       <th>Наименование товара</th>
                                       {{-- <th>Наименование организации</th> --}}
                                       {{-- <th>Роль</th> --}}
                                       <th>Количество</th>
                                       <th>Цена</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>{{ $item->id }}</td>    
                                         <td>{{ $item->order_products()->pluck('name')->implode(', ') }}</td>
                                         <td>{{ $item->order_products()->pluck('count')->implode(', ') }}</td>
                                         <td>{{ $item->order_products()->pluck('price')->implode(', ') }}</td>
                                         <td>{{ $item->order_products()->pluck('entityprice')->implode(', ') }}</td> 
                                        </tr> 
                                       </tbody>
                                      </table>                                     
                                    
                                </div>
                           </td>
                           <td>
                                {{ $item->order_products()->pluck('name')->implode(', ') }}
                           </td>
                        </tr>
                     @endforeach
                      
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- container-fluid -->
</div>
<!-- content -->
@endsection
