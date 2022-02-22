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
                            <h4 class="page-title mb-0">Категорий</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Категорий</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Создать категорию</li>
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
                        <div class="tab-pane p-3" id="profile2" role="tabpanel">
                            <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="name">Название катергорий</label>
                                    <div class="col-sm-10"><input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{ old('name') }}" required autofocus placeholder="Название катергорий"></div>

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-sm-2 col-form-label">Изображение</label>
                                    <div class="col-sm-10"><input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}"></div>
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="slug">URL для категорий</label>
                                    <div class="col-sm-10"><input id="slug" type="slug" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}"
                                        name="slug" value="{{ old('slug') }}" required placeholder="Введите URL"></div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="title">Title</label>
                                    <div class="col-sm-10"><input id="title" type="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                        name="title" value="{{ old('title') }}" required placeholder="title"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="metadesc">Metadesc</label>
                                    <div class="col-sm-10"><input id="metadesc" type="metadesc" class="form-control{{ $errors->has('metadesc') ? ' is-invalid' : '' }}"
                                        name="metadesc" value="{{ old('metadesc') }}" required placeholder="metadesc"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="keywords">Keywords</label>
                                    <div class="col-sm-10"><input id="keywords" type="keywords" class="form-control{{ $errors->has('keywords') ? ' is-invalid' : '' }}"
                                        name="keywords" value="{{ old('keywords') }}" required placeholder="keywords"></div>
                                </div>
                                
                                

                                {{--<div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="parent_id">Введите категорию id</label>
                                    <div class="col-sm-10"><input id="parent_id" type="parent_id" class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}"
                                        name="parent_id" value="{{ old('parent_id') }}" placeholder="Введите категорию id"></div>
                                </div>--}}
                                <div class="form-group row">
                                    <label for="parent_id" class="col-sm-2 col-form-label">Категория:</label>
                                    <div class="col-sm-10">
                                        <select name="parent_id" class="form-control">
                                            @foreach ($category as $categories)
                                                <option value="{{ $categories->id }}">
                                                    {{ $categories->name }}
                                                </option>
                                            @endforeach;
                                                <option value="">
                                                    Не имеет категорию
                                                </option>
                                        </select>
                                    </div>
                                    @if ($errors->has('parent_id'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('parent_id') }}</strong></span>
                                    @endif
                                </div>                                

                                {{--<div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="active">Активный 1 / Не активный 0</label>
                                    <div class="col-sm-10"><input id="active" type="active" class="form-control{{ $errors->has('active') ? ' is-invalid' : '' }}" name="active" value="{{ old('active') }}" required placeholder="Актив"></div>
                                </div>--}}
                                <div class="form-group row">
                                    <label for="active" class="col-sm-2 col-form-label">Активный товар</label>
                                    <div class="col-sm-10">
                                        <select name="active" class="form-control">
                                            <option value="1" selected>Активный</option>
                                            <option value="0" selected>Не активный</option>
                                        </select>
                                        @if ($errors->has('active'))
                                            <span class="invalid-feedback"><strong>{{ $errors->first('active') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row m-t-20">
                                    <div class="text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Создать</button>
                                    </div>
                                </div>
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