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
                        <h4 class="mt-0 header-title">Данные вакансии "{{ $vacancy->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные вакансии.</p>

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Название вакансии</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $vacancy->name }}" id="username" disabled></div>
                        </div>

                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Текст</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{!! $vacancy->description !!}" id="userfullname" disabled></div>
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