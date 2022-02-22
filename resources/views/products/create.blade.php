@extends('layouts.administrator')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
        $(document).ready(function() {
            // var max_fields      = 20;
            var wrapper         = $(".container1");
            var add_button      = $(".add_form_field");

            var param = $("div[class*='conveniancecount']").length;
            var x = param;

            $(add_button).click(function(e){
                e.preventDefault();
                
                    $(wrapper).append('<div class="form-group"><input class="form-control" type="text" name="mytext['+ x +']"/><a href="#" class="delete btn btn-danger waves-effect">Delete</a></div><div class="form-group"><input class="form-control" type="text" name="label['+ x +']"/><a href="#" class="delete btn btn-danger waves-effect">Delete</a></div>'); //add input box
                    x++;
               
            });

            $(wrapper).on("click",".delete", function(e){
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
        </script>

<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title mb-0">Товары</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Товары</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Создать товар</li>
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
                            <form method="POST" action="{{ route('products.store') }}"  enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label for="name" class="col-form-label">Название товара</label>
                                    <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Title</label>
                                    <input id="title" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
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
                                    <label for="description" class="col-form-label">Описание</label>
                                    <textarea name="description" id="editor"></textarea>
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

                                <div class="form-group">
                                    <label for="image" class="col-form-label">Главное изображение</label>
                                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image1" class="col-form-label">Изображение 1</label>
                                    <input id="image1" type="file" class="form-control{{ $errors->has('image1') ? ' is-invalid' : '' }}" name="image1" value="{{ old('image1') }}">
                                    @if ($errors->has('image1'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('image1') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image2" class="col-form-label">Изображение 2</label>
                                    <input id="image2" type="file" class="form-control{{ $errors->has('image2') ? ' is-invalid' : '' }}" name="image2" value="{{ old('image2') }}">
                                    @if ($errors->has('image2'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('image2') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image3" class="col-form-label">Изображение 3</label>
                                    <input id="image3" type="file" class="form-control{{ $errors->has('image3') ? ' is-invalid' : '' }}" name="image3" value="{{ old('image3') }}">
                                    @if ($errors->has('image3'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('image3') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image4" class="col-form-label">Изображение 4</label>
                                    <input id="image4" type="file" class="form-control{{ $errors->has('image4') ? ' is-invalid' : '' }}" name="image4" value="{{ old('image4') }}">
                                    @if ($errors->has('image4'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('image4') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image5" class="col-form-label">Изображение 5</label>
                                    <input id="image5" type="file" class="form-control{{ $errors->has('image5') ? ' is-invalid' : '' }}" name="image5" value="{{ old('image5') }}">
                                    @if ($errors->has('image5'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('image5') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image6" class="col-form-label">Изображение 6</label>
                                    <input id="image6" type="file" class="form-control{{ $errors->has('image6') ? ' is-invalid' : '' }}" name="image6" value="{{ old('image6') }}">
                                    @if ($errors->has('image6'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('image6') }}</strong></span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label for="file" class="col-form-label">Драйвер</label>
                                    <input id="file" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" value="{{ old('file') }}">
                                    @if ($errors->has('file'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('file') }}</strong></span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label for="entityprice" class="col-form-label">Цена для юридических лиц</label>
                                    <input id="entityprice" class="form-control{{ $errors->has('entityprice') ? ' is-invalid' : '' }}" name="entityprice" value="{{ old('entityprice') }}" required>
                                    @if ($errors->has('entityprice'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('entityprice') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="individualprice" class="col-form-label">Цена для физических лиц</label>
                                    <input id="individualprice" class="form-control{{ $errors->has('individualprice') ? ' is-invalid' : '' }}" name="individualprice" value="{{ old('individualprice') }}" required>
                                    @if ($errors->has('individualprice'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('individualprice') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="valut" class="col-form-label">Валюта</label>
                                    <select name="valut" class="form-control">
                                        <option value="1" selected>Доллар</option>
                                        <option value="0" selected>Тенге</option>
                                    </select>
                                    @if ($errors->has('is_active'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('is_active') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="techspec" class="col-form-label">Выберите Категорию</label>
                                    <select name="techspec" class="form-control">
                                        <option value="{{$category[1]->id}}" selected>{{$category[1]->name}}</option>
                                        <option>--------{{$category[0]->name}}--------</option>
                                        @foreach( $category_1 as $category)
                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @endforeach
                                        <option>--------Комплектующие--------</option>
                                        @foreach( $category_3 as $category)
                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @endforeach
                                        <option>--------Запасные части--------</option>
                                        
                                        @foreach( $category_4 as $category)
                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('techspec'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('techspec') }}</strong></span>
                                    @endif
                                </div>
                                {{--<div class="form-group">
                                    <label for="is_active" class="col-form-label">Активный товар</label>
                                    <input id="is_active" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }}" name="is_active" value="{{ old('is_active') }}" required>
                                    @if ($errors->has('is_active'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('is_active') }}</strong></span>
                                    @endif
                                </div>--}}
                                <div class="form-group">
                                    <label for="is_active" class="col-form-label">Активный товар</label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" selected>Активный</option>
                                        <option value="0" selected>Не активный</option>
                                    </select>
                                    @if ($errors->has('is_active'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('is_active') }}</strong></span>
                                    @endif
                                </div>
                                
                                {{--<div class="form-group">
                                    <label for="sell" class="col-form-label">Выводить в топ продаж</label>
                                    <input id="sell" class="form-control{{ $errors->has('sell') ? ' is-invalid' : '' }}" name="sell" value="{{ old('sell') }}" required>
                                    @if ($errors->has('sell'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('sell') }}</strong></span>
                                    @endif
                                </div>--}}
                                
                                <div class="form-group">
                                    <label for="sell" class="col-form-label">Выводить в топ продаж</label>
                                    <select name="sell" class="form-control">
                                        <option value="1" selected>Выводить</option>
                                        <option value="0" selected>Не выводить</option>
                                    </select>
                                    @if ($errors->has('sell'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('sell') }}</strong></span>
                                    @endif
                                </div>

{{--                                <div class="container1 form-group">--}}
{{--                                        <button class="add_form_field btn btn-primary waves-effect">Добавить новый параметр &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>--}}

{{--                                        --}}{{--<div class="form-group"><input type="text" name="mytext[0]" class="form-control"></div>--}}
{{--                                    </div>--}}

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                            {{--  <form method="POST" action="{{ route('createparameter') }}"  enctype="multipart/form-data">
                                @csrf
                                <div class="container1 form-group">
                                    <button class="add_form_field btn btn-primary waves-effect">Добавить новый параметр &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>

                                    <div class="form-group"><input type="text" name="mytext[]" class="form-control"></div>
                                </div>

                                <button type="submit" class="btn btn-primary waves-effect">Обновить Параметры</button>
                                </form>  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- content -->
    @endsection
