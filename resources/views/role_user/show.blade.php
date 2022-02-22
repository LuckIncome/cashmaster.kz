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
                                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Пользователи</a></li>
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
                        <h4 class="mt-0 header-title">Данные пользователя "{{ $collection->role_id }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные пользователя.</p>

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Отображаемое имя</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->role_id }}" id="username" disabled></div>
                        </div>

                        <div class="form-group row">
                                <label for="useremail" class="col-sm-2 col-form-label">Почта</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->user_id }}" id="useremail" disabled></div>
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