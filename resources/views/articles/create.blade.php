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
                                <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Информация</a></li>
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
                            <form method="POST" action="{{ route('articles.store') }}"  enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label for="name" class="col-form-label">Имя</label>
                                    <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label for="title" class="col-form-label">title</label>
                                    <input id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('title') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="metadesc" class="col-form-label">Metadesc</label>
                                    <input id="metadesc" class="form-control{{ $errors->has('metadesc') ? ' is-invalid' : '' }}" name="metadesc" value="{{ old('metadesc') }}" required>
                                    @if ($errors->has('metadesc'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('metadesc') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="keywords" class="col-form-label">Keywords</label>
                                    <input id="keywords" class="form-control{{ $errors->has('keywords') ? ' is-invalid' : '' }}" name="keywords" value="{{ old('keywords') }}" required>
                                    @if ($errors->has('keywords'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('keywords') }}</strong></span>
                                    @endif
                                </div>
                        
                                <div class="form-group">
                                    <label for="description" class="col-form-label">description</label>
                                    <textarea id="summernote" name="description"></textarea>
                                    <script>
                                      $('#summernote').summernote({
                                        placeholder: 'Hello stand alone ui',
                                        tabsize: 2,
                                        height: 100
                                      });
                                    </script>      
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('description') }}</strong></span>
                                    @endif
                                </div> 
                                {{-- <div class="form-group">
                                    <label for="description" class="col-form-label">Текст</label>
                                    <textarea name="description" id="editor"></textarea>
                                </div>--}}
                                {{-- <div class="form-group">
                                    <label for="image" class="col-form-label">Image</label>
                                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>
                                    @endif
                                </div> --}}
                        

                        
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