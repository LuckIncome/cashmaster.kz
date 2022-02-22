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
                                    <li class="breadcrumb-item active" aria-current="page">Показать</li>
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
                        <h4 class="mt-0 header-title">Данные пользователя "{{ $categories->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные пользователя.</p>

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Отображаемое имя товара</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $categories->name }}" id="username" disabled></div>
                        </div>

                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Описание товара</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $categories->description }}" id="userfullname" disabled></div>
                        </div>
                        
                        
                         
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Изображение</label>
                            <img src="{{ Storage::url($categories->image) }}" alt="" style="width: 150px">
                        </div>
                        
                        @if($categories->parent_id==null)
                            <div class="form-group row">
                                <label for="slide" class="col-sm-2 col-form-label">Слайдер</label>
                                <img src="{{ Storage::url($categories->slide) }}" alt="" style="width: 150px; height:150px">
                            </div>
                        @else
                    
                        @endif

                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Название URL</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $categories->slug }}" id="slug" name="slug" disabled></div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Категорий</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $categories->parent_id }}" id="parent_id" name="parent_id" disabled></div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Активный</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $categories->active }}" id="active" name="active" disabled></div>
                        </div>
                        
                        
                        

                        <a class="btn btn-primary waves-effect" href="{{ URL::previous() }}">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->
@endsection