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
                            <h4 class="page-title mb-0">{{ $about->name }}</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('about.index') }}">{{ $about->name }}</a></li>
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
                        <h4 class="mt-0 header-title">Данные страницы "{{ $about->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные страницы.</p>

                        <form action="{{ route('about.update', $about->id) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Отображаемое имя</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $about->name }}" id="name" name="name"></div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Видео</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $about->video }}" id="video" name="video"></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Видео</label>
                            <div class="col-sm-10"><input class="form-control" type="file" name="image"></div>
                            {{ $about->image }}
                        </div>
                        
                        {{--<div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10"><div>{!! $about->video !!}</div></div>
                        </div>--}}

                        <div class="form-group row">
                                <label for="useremail" class="col-sm-2 col-form-label">Текст</label>
                                <div class="col-sm-10">
                                    {{-- <input class="form-control" type="text" value="{{ $about->description }}" id="description" name="description"> --}}
                                    <textarea id="summernote" name="description">{{ $about->description }}</textarea>
                                    <script>
                                      $('#summernote').summernote({
                                        placeholder: 'Hello stand alone ui',
                                        tabsize: 2,
                                        height: 100
                                      });
                                    </script>  
                                </div>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect">Обновить</button> <a class="btn btn-primary waves-effect" href="{{ route('about.index') }}">Назад</a>
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