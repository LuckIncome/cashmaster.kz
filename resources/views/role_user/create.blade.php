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
                                <li class="breadcrumb-item active" aria-current="page">Создать пользователя</li>
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
                            <form method="POST" action="{{ route('role_user.store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="role_id">role_id</label>
                                    <div class="col-sm-10"><input id="role_id" type="role_id" class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}"
                                        name="role_id" value="{{ old('role_id') }}" required placeholder="Введите адрес электронной почты"></div>

                                    @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="user_id">user_id</label>
                                    <div class="col-sm-10"><input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}"
                                        name="user_id" value="{{ old('user_id') }}" required autofocus placeholder="Введите имя пользователя"></div>

                                    @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
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