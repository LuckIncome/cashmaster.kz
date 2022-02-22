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
                                    <li class="breadcrumb-item"><a href="{{ route('colleagues.index') }}">Партнеры</a></li>
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
                        <h4 class="mt-0 header-title">Данные партнера "{{ $colleagues->title }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные партнера.</p>

                        <form action="{{ route('colleagues.update', $colleagues->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Отображаемое имя</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $colleagues->title }}" id="title" name="title"></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Должность</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $colleagues->position }}" id="position" name="position"></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Телефон</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $colleagues->phone }}" id="phone" name="phone"></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $colleagues->email }}" id="email" name="email"></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Skype</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $colleagues->skype }}" id="skype" name="skype"></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Изображение</label>
                            <div class="col-sm-10"><input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image', $colleagues->image) }}"></div>
                            <label for="image" class="col-sm-2 col-form-label"></label>
                            @if($colleagues->image)<div class="col-sm-10"><img src="{{ Storage::url($colleagues->image) }}" alt=""></div>@endif
                            @if ($errors->has('image'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="status" class="col-form-label">Активный/Не активный</label>
                            <select name="status" class="form-control">
                                @if($colleagues->status==1)<option value="{{ old('status', $colleagues->status) }}" selected>Активный</option>
                                <option value="0">Не активный</option>
                                @else
                                <option value="1" >Активный</option>
                                <option value="0" selected>Не активный</option>
                                @endif
                            </select>
                            @if ($errors->has('status'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary waves-effect">Обновить</button> <a class="btn btn-primary waves-effect" href="{{ route('colleagues.index') }}">Назад</a>
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