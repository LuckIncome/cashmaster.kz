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
                    {{--<a href="/export2"><div class="export">Экспортировать историю товаров</div></a>--}}
                    <p class="text-muted m-b-15">
                        {{-- <a href="{{ route('currency.create') }}"><button class="btn btn-primary btn-sm waves-effect">Создать пользователя</button></a>  --}}
                    </p>
                    <div class="table-responsive">
                  <table class="table table-bordered mb-0">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Отображаемое имя</th>
                           <th>Почта</th>
                           <th>Телефон</th>
                           <th>Отдел</th>
                           <th>Текст</th>
                           <th>Дата</th>
                           <th>Контроль</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach ($forms as $item)
                     @if($item->status == 1)
                        <tr style="background: #17dc55;">
                           <td>{{ $item->id }}</td>
                           <td>{{ $item->name }}</td>
                           <td>{{ $item->email }}</td> 
                           <td>{{ $item->phone }}</td> 
                           <td>{{ $item->techspec }}</td>
                           <td>{{ str_limit($item->body, $limit = 500, $end = '...') }}</td> 
                           <td>{{ $item->created_at }}</td>
                           <td><a href="{{ route('forms.edit', $item->id) }}"><button type="submit" class="btn btn-warning btn-sm waves-effect">Редактировать</button></a></td>
                        </tr>
                    @else
                        <tr>
                           <td>{{ $item->id }}</td>
                           <td>{{ $item->name }}</td>
                           <td>{{ $item->email }}</td> 
                           <td>{{ $item->phone }}</td> 
                           <td>{{ $item->techspec }}</td>
                           <td>{{ str_limit($item->body, $limit = 500, $end = '...') }}</td> 
                           <td>{{ $item->created_at }}</td>
                           <td><a href="{{ route('forms.edit', $item->id) }}"><button type="submit" class="btn btn-warning btn-sm waves-effect">Редактировать</button></a></td>
                        </tr>
                    @endif
                     @endforeach
                     </tbody>
                  </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- container-fluid -->
</div>
<!-- content -->
@endsection
