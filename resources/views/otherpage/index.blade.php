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
                     <h4 class="page-title mb-0">Другие страницы</h4>
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Другие страницы</li>
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
                    <h4 class="mt-0 header-title">Список дргуих страниц</h4>
                    <p class="text-muted m-b-30 font-14">Содержит список созданных страниц.</p>
                    <p class="text-muted m-b-15">
                        {{-- <a href="{{ route('otherpage.create') }}"><button class="btn btn-primary btn-sm waves-effect">Создать пользователя</button></a>  --}}
                    </p>
                  <table class="table table-bordered mb-0">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Название страниц</th>
                           <th>Текст</th>
                           {{-- <th>ФИО</th> --}}
                           <th>Контроль</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach ($otherpage as $item)
                        <tr>
                           <td>{{ $item->id }}</td>
                           <td>{{ $item->name }}</td>
                           <td>{!! \Illuminate\Support\Str::words($item->description, 50,'....')  !!}</td>
                           {{-- <td><img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" style="width:150px;"></td> --}}
                           <td>
                            <a href="{{ route('otherpage.show', $item->id) }}"><button type="submit" class="btn btn-success btn-sm waves-effect">Показать</button></a>
                            <a href="{{ route('otherpage.edit', $item->id) }}"><button type="submit" class="btn btn-warning btn-sm waves-effect">Редактировать</button></a>
                            {{-- <form action="{{ route('otherpage.destroy', $item->id) }}" method="POST" style ='display: inline-block;'>
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm waves-effect" onclick="return confirm('Вы уверены, что хотите удалить пользователя?')">Удалить</button>
                             </form> --}}
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