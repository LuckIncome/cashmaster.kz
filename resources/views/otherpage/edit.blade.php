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
                            <h4 class="page-title mb-0">Другие страницы</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('otherpage.index') }}">Другие страницы</a></li>
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
                        <h4 class="mt-0 header-title">Данные других страниц "{{ $otherpage->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные других страниц.</p>

                        <form action="{{ route('otherpage.update', $otherpage->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Отображаемое имя</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $otherpage->name }}" id="name" name="name"></div>
                        </div>

                        <div class="form-group row">
                                <label for="useremail" class="col-sm-2 col-form-label">Текст</label>
                                <div class="col-sm-10">
                                    {{-- <input class="form-control" type="text" value="{{ $otherpage->description }}" id="description" name="description"> --}}
                                    {{--  <textarea name="description" id="editor">
                                            &lt;p&gt;{{ $otherpage->description }}&lt;/p&gt;
                                    </textarea>  --}}
                                    {{--  <div id="summernote" name="description"><p>Hello Summernote</p></div>  --}}
                                    {{--  <textarea id="summernote" name"description"></textarea>  --}}
                                    {{--  <form method="post">  --}}
                                        <textarea id="summernote" name="description">{{ $otherpage->description }}</textarea>
                                    {{--  </form>  --}}
                                    <script>
                                      $('#summernote').summernote({
                                        placeholder: 'Hello stand alone ui',
                                        tabsize: 2,
                                        height: 100
                                      });
                                    </script>

                                </div>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect">Обновить</button> <a class="btn btn-primary waves-effect" href="{{ route('otherpage.index') }}">Назад</a>
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



