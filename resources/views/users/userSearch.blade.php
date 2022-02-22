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
                     <h4 class="page-title mb-0">Пользователи</h4>
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Пользователи</li>
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
                    <h4 class="mt-0 header-title">Список пользователей</h4>
                    <p class="text-muted m-b-30 font-14">Содержит список созданных пользователей.</p>
                    <p class="text-muted m-b-15">
                        <a href="{{ route('user.create') }}"><button class="btn btn-primary btn-sm waves-effect">Создать пользователя</button></a> 
                    </p>
                    <p>
                        <form method="GET" action="{{ route('cart.search3') }}">
                            <input type="text" name="q" placeholder="Найти ...">
                            <input type="submit" name="sear" class="sear" value="Искать">
                            
                        </form>
                    </p>
                  <table class="table table-bordered mb-0">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Отображаемое имя</th>
                           <th>Почта</th>
                           <th>ФИО</th>
                           <th>Наименование организации</th>
                           <th>Роль</th>
                           <th>Верификация</th>
                           <th>Контроль</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach ($collection as $item)
                     @if($item->roles()->pluck('role_id')->implode(', ') == 4)
                        <tr>
                            @if($item->id == 1)
                            @elseif($item->id == 2)   
                            @elseif($item->id == 3)
                            @else
                            
                               <td><b>{{ $item->id }}</b></td>
                               <td><b>{{ $item->name }}</b></td>
                               <td><b>{{ $item->email }}</b></td>
                               <td><b>{{ $item->firstname }} {{ $item->lastname }} {{ $item->middlename }}</b></td>
                               <td><b>{{ $item->companyname }}</b></td>
                               <td>
                                   <b>{{ $item->roles()->pluck('description')->implode(', ') }}</b>
                               </td> 
                               <td>{{ $item->email_verified_at }}</td>
                               <td>
                                <a href="{{ route('user.show', $item->id) }}"><button type="submit" class="btn btn-success btn-sm waves-effect">Показать</button></a>
                                <a href="{{ route('user.edit', $item->id) }}"><button type="submit" class="btn btn-warning btn-sm waves-effect">Редактировать</button></a>
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST" style ='display: inline-block;'>
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm waves-effect" onclick="return confirm('Вы уверены, что хотите удалить пользователя?')">Удалить</button>
                                 </form>
                                </td>
                                @endif
                            </tr>
                     @else
                        <tr>
                            @if($item->id == 1)
                            @elseif($item->id == 2)   
                            @elseif($item->id == 3)
                            @else
                            
                               <td>{{ $item->id }}</td>
                               <td>{{ $item->name }}</td>
                               <td>{{ $item->email }}</td>
                               <td>{{ $item->firstname }} {{ $item->lastname }} {{ $item->middlename }}</td>
                               <td>{{ $item->companyname }}</td>
                               <td>
                                   {{ $item->roles()->pluck('description')->implode(', ') }}
                               </td> 
                               <td>{{ $item->email_verified_at }}</td>
                               <td>
                                <a href="{{ route('user.show', $item->id) }}"><button type="submit" class="btn btn-success btn-sm waves-effect">Показать</button></a>
                                <a href="{{ route('user.edit', $item->id) }}"><button type="submit" class="btn btn-warning btn-sm waves-effect">Редактировать</button></a>
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST" style ='display: inline-block;'>
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm waves-effect" onclick="return confirm('Вы уверены, что хотите удалить пользователя?')">Удалить</button>
                                 </form>
                                </td>
                                @endif
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
   <!-- container-fluid -->
</div>
<!-- content -->
@endsection