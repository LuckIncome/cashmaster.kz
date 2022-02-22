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
                            <h4 class="page-title mb-0">Полезная информация</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Полезная информация</a></li>
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
                        <h4 class="mt-0 header-title">Полезная информация "{{ $article->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Полезная информация.</p>

                        <form action="{{ route('articles.update', $article->id) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Название информации</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $article->name }}" id="name" name="name"></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $article->title }}" id="title" name="title"></div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Metadesc</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $article->metadesc }}" id="metadesc" name="metadesc"></div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Keywords</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $article->keywords }}" id="keywords" name="keywords"></div>
                        </div>

                        <div class="form-group row">
                                <label for="useremail" class="col-sm-2 col-form-label">Текст</label>
                                <div class="col-sm-10"><textarea id="summernote" name="description">{{ $article->description }}</textarea></div>
                        </div>

                        <script>
                          $('#summernote').summernote({
                            placeholder: 'Hello stand alone ui',
                            tabsize: 2,
                            height: 100
                          });
                        </script>                              

                        <button type="submit" class="btn btn-primary waves-effect">Обновить</button> <a class="btn btn-primary waves-effect" href="{{ route('articles.index') }}">Назад</a>
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