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
                            <h4 class="page-title mb-0">Галерея</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('forms.index') }}">Формы</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Редактировать</li>
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
                        <h4 class="mt-0 header-title">Данные партнера "{{ $forms->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные партнера.</p>

                        <form action="{{ route('forms.update', $forms->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Обработан</label>
                            <div class="col-sm-10">
                                {{--<input class="form-control" type="text" value="{{ $forms->status }}" id="status" name="status">--}}
                                <select name="status" class="form-control">
                                    @if($forms->status == 0)
                                        <option value="0" selected>Не обработан</option>
                                        <option value="1">Обработан</option>
                                    @else
                                        <option value="0">Не обработан</option>
                                        <option value="1" selected>Обработан</option>                                    
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect">Обновить</button> <a class="btn btn-primary waves-effect" href="{{ route('forms.index') }}">Назад</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->
@endsection