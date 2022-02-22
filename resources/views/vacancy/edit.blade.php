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
                            <h4 class="page-title mb-0">Вакансии</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('vacancy.index') }}">Вакансии</a></li>
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
                        <h4 class="mt-0 header-title">Данные вакансии "{{ $vacancy->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные вакансии.</p>

                        <form action="{{ route('vacancy.update', $vacancy->id) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Название вакансии</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $vacancy->name }}" id="name" name="name"></div>
                        </div>

                        <div class="form-group row">
                                <label for="useremail" class="col-sm-2 col-form-label">Текст вакансии</label>
                                <div class="col-sm-10">
                                    
                                    <textarea name="description" id="editor">
                                        &lt;p&gt;{{ $vacancy->description }}&lt;/p&gt;
                                    </textarea>
                                </div>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect">Обновить</button> <a class="btn btn-primary waves-effect" href="{{ route('vacancy.index') }}">Назад</a>
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