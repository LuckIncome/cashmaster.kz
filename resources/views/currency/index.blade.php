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
                     <h4 class="page-title mb-0">Валюта</h4>
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Валюта</li>
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
                    <h4 class="mt-0 header-title">Список валют</h4>
                    <p class="text-muted m-b-30 font-14">Содержит список созданных валют.</p>
                    <p class="text-muted m-b-15">
                        {{-- <a href="{{ route('currency.create') }}"><button class="btn btn-primary btn-sm waves-effect">Создать пользователя</button></a>  --}}
                    </p>
                  <table class="table table-bordered mb-0">
                     <thead>
                        <tr>
                           <th>#</th>
                           {{-- <th>Отображаемое имя</th> --}}
                           {{-- <th>Текст</th> --}}
                           <th>Валюта</th>
                           {{-- <th>Наименование организации</th> --}}
                           {{-- <th>Роль</th> --}}
                           <th>Курс</th>
                           <th>Контроль</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach ($currency as $item)
                        <tr>
                           <td>{{ $item->id }}</td>
                           <td>{{ $item->name }}</td>
                           {{-- <td>{{ $item->description }}</td> --}}
                           <td>{{ $item->coefficient }}</td>
                           <td>
                            {{--<a href="{{ route('currency.show', $item->id) }}"><button type="submit" class="btn btn-success btn-sm waves-effect">Показать</button></a>--}}
                            <a href="{{ route('currency.edit', $item->id) }}"><button type="submit" class="btn btn-warning btn-sm waves-effect">Редактировать</button></a>
                            {{--<form action="{{ route('currency.destroy', $item->id) }}" method="POST" style ='display: inline-block;'>
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm waves-effect" onclick="return confirm('Вы уверены, что хотите удалить пользователя?')">Удалить</button>
                             </form>--}}
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