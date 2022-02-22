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
                            <h4 class="page-title mb-0">Информации</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Информация</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Создать информацию</li>
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
                            <form method="POST" action="{{ route('gallery.store') }}"  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="image" class="col-form-label">Имя</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }} name="name" value="{{ old('name') }}">
                                </div> 
                                
                                <div class="form-group">
                                    <label for="image" class="col-form-label">Image</label>
                                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>
                                    @endif
                                </div> 
                        

                        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-primary waves-effect" href="{{ URL::previous() }}">Назад</a>
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