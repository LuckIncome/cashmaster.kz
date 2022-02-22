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
                                    <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">Пользователи</a></li>
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
                        <h4 class="mt-0 header-title">Данные пользователя "{{ $contacts->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные пользователя.</p>

                        <form action="{{ route('contacts.update', $contacts->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Город</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $contacts->name }}" id="name" name="name"></div>
                        </div>
                        <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Телефон 1</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $contacts->phone1 }}" id="phone1" name="phone1"></div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Телефон 2</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $contacts->phone2 }}" id="phone2" name="phone2"></div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Телефон 3</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $contacts->phone3 }}" id="phone3" name="phone3"></div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Телефон 4</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $contacts->phone4 }}" id="phone4" name="phone4"></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Текст</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $contacts->description }}" id="description" name="description"></div>
                        </div>

                        {{--<div class="form-group row">
                                <label for="useremail" class="col-sm-2 col-form-label">Текст</label>
                                <div class="col-sm-10">
                                   
                                    <textarea name="description" id="editor">
                                            &lt;p&gt;{{ $contacts->description }}&lt;/p&gt;
                                    </textarea>
                                </div>
                        </div>--}}
                        {{--<div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Изображение</label>
                            <div class="col-sm-10"><input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image', $contacts->image) }}"></div>
                            <label for="image" class="col-sm-2 col-form-label"></label>
                            @if($contacts->image)<div class="col-sm-10 image-contacts"><img src="{{ Storage::url($contacts->image) }}" alt=""></div>@endif
                            @if ($errors->has('image'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>
                            @endif
                        </div>--}}

                        <button type="submit" class="btn btn-primary waves-effect">Обновить</button> <a class="btn btn-primary waves-effect" href="{{ route('contacts.index') }}">Назад</a>
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