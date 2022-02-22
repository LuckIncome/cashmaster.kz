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
                                    <li class="breadcrumb-item"><a href="{{ route('currency.index') }}">Пользователи</a></li>
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
                        <h4 class="mt-0 header-title">Данные пользователя "{{ $currencies->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные пользователя.</p>

                        <form action="{{ route('currency.update', $currencies->id) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Отображаемое имя</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $currencies->name }}" id="username" name="username"></div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">ФИО</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $currencies->description }}" id="description" name="description"></div>
                        </div>

                        <div class="form-group row">
                            <label for="coefficient" class="col-sm-2 col-form-label">ФИО</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $currencies->coefficient }}" id="coefficient" name="coefficient"></div>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect">Обновить</button> <a class="btn btn-primary waves-effect" href="{{ route('currency.index') }}">Назад</a>
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