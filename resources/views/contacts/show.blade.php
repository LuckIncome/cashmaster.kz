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
                            <h4 class="page-title mb-0">Контакты</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">Контакты</a></li>
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
                        <h4 class="mt-0 header-title">Контакты "{{ $contacts->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Контакты.</p>

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Отображаемое имя</label>
                            <div class="col-sm-10"><label for="username" class="col-sm-2 col-form-label">{{ $contacts->name }}</label></div>
                        </div>

                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Телефон 1</label>
                            <div class="col-sm-10"><label for="username" class="col-sm-2 col-form-label">{{ $contacts->phone1 }}</label></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Телефон 2</label>
                            <div class="col-sm-10"><label for="username" class="col-sm-2 col-form-label">{{ $contacts->phone2 }}</label></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Телефон 3</label>
                            <div class="col-sm-10"><label for="username" class="col-sm-2 col-form-label">{{ $contacts->phone3 }}</label></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Текст</label>
                            <div class="col-sm-10"><p>{!! $contacts->description !!}</p></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Изображение</label>
                            <div class="col-sm-10"><img src="{{ Storage::url($contacts->image) }}"></div>
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