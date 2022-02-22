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
                                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Пользователи</a></li>
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
                            <form method="POST" action="{{ route('currency.store') }}"  enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label for="name" class="col-form-label">Имя</label>
                                    <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                                    @endif
                                </div>
                        
                                <div class="form-group">
                                    <label for="description" class="col-form-label">description</label>
                                    <input id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('description') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="coefficient" class="col-form-label">coefficient</label>
                                    <input id="coefficient" class="form-control{{ $errors->has('coefficient') ? ' is-invalid' : '' }}" name="coefficient" value="{{ old('coefficient') }}" required>
                                    @if ($errors->has('coefficient'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('coefficient') }}</strong></span>
                                    @endif
                                </div>
                        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
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