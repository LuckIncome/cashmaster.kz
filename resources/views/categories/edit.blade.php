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
                                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Пользователи</a></li>
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
                        <h4 class="mt-0 header-title">Данные пользователя "{{ $category->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные пользователя.</p>

                        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Отображаемое имя</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $category->name }}" id="name" name="name"></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $category->title }}" id="title" name="title"></div>
                        </div>
                        <div class="form-group row">
                            <label for="metadesc" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $category->metadesc }}" id="metadesc" name="metadesc"></div>
                        </div>
                        <div class="form-group row">
                            <label for="keywords" class="col-sm-2 col-form-label">Keywords</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $category->keywords }}" id="keywords" name="keywords"></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">ФИО</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $category->description }}" id="firstname" name="firstname"></div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Изображение</label>
                            <div class="col-sm-10"><input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image', $category->image) }}"></div>
                            @if($category->image)<img src="{{ Storage::url($category->image) }}" alt="" style="">@endif
                            @if ($errors->has('image'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>
                            @endif
                        </div>
                        
                        <div class="form-group row">
                            <label for="slide" class="col-sm-2 col-form-label">Слайдер</label>
                            <div class="col-sm-10"><input id="slide" type="file" class="form-control{{ $errors->has('slide') ? ' is-invalid' : '' }}" name="slide" value="{{ old('slide', $category->slide) }}"></div>
                            @if($category->slide)<img src="{{ Storage::url($category->slide) }}" alt="" style="width: 150px; height:150px">@endif
                            @if ($errors->has('slide'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('slide') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Название URL</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $category->slug }}" id="slug" name="slug"></div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Категорий</label>
                            <div class="col-sm-10">
                                <select id="parent_id" class="form-control" name="parent_id">
                                    <option value="">Без родителя</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"{{ $cat->id == old('parent_id', $category->parent_id) ? ' selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach;
                                </select>
                                {{--<input class="form-control" type="text" value="{{ $category->parent_id }}" id="parent_id" name="parent_id">--}}
                            </div>
                        </div>

                        {{--<div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Активный</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $category->active }}" id="active" name="active"></div>
                        </div>--}}
                        <div class="form-group row">
                            <label for="active" class="col-sm-2 col-form-label">Активный/Не активный</label>
                            <div class="col-sm-10">
                                <select name="active" class="form-control">
                                    @if($category->active==1)<option value="{{ old('active', $category->active) }}" selected>Активный</option>
                                    <option value="0">Не активный</option>
                                    @else
                                    <option value="1" >Активный</option>
                                    <option value="0" selected>Не активный</option>
                                    @endif
                                </select>
                                @if ($errors->has('active'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('active') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect">Обновить</button> <a class="btn btn-primary waves-effect" href="{{ route('categories.index') }}">Назад</a>
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