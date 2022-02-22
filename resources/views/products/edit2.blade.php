@extends('layouts.administrator')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
        $(document).ready(function() {
            var max_fields      = 20;
            var wrapper         = $(".container1");
            var add_button      = $(".add_form_field");

            var param = $("div[class*='conveniancecount']").length;
            var x = param;

            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    $(wrapper).append('<div class="form-group"><input class="form-control" type="text" name="label['+ x +']"/></div><div class="form-group"><input class="form-control" type="text" name="mytext['+ x +']"/></div>'); //add input box
                    x++;
                }
                else
                {
                alert('You Reached the limits')
                }
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
                        <h4 class="mt-0 header-title">Данные товара "{{ $products->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные товара.</p>

                        <form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf



                        {{-- <div class="form-group">
                            <label for="key" class="col-form-label">Псевдоним (на английском)</label>
                            <input id="key" class="form-control{{ $errors->has('key') ? ' is-invalid' : '' }}" name="key" value="{{ old('key', $products->name) }}" required>
                            @if ($errors->has('key'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('key') }}</strong></span>
                            @endif
                        </div> --}}

                        <div class="form-group">
                            <label for="name" class="col-form-label">Название товара</label>
                            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $products->name) }}" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-form-label">Текст товара</label>
                            <textarea name="description" id="editor">{{ $products->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-form-label">Главное изображение</label>
                            <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image', $products->image) }}">
                            @if($products->image)<img src="{{ Storage::url($products->image) }}" alt="" style="width: 150px; height: 150px">@endif
                            @if ($errors->has('image'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image1" class="col-form-label">Изображение 1</label>
                            <input id="image1" type="file" class="form-control{{ $errors->has('image1') ? ' is-invalid' : '' }}" name="image1" value="{{ old('image1', $products->image1) }}">
                            @if($products->image1)<img src="{{ Storage::url($products->image1) }}" alt="" style="width: 150px; height: 150px">@endif
                            @if ($errors->has('image1'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('image1') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image2" class="col-form-label">Изображение 2</label>
                            <input id="image2" type="file" class="form-control{{ $errors->has('image2') ? ' is-invalid' : '' }}" name="image2" value="{{ old('image2', $products->image2) }}">
                            @if($products->image2)<img src="{{ Storage::url($products->image2) }}" alt="" style="width: 150px; height: 150px">@endif
                            @if ($errors->has('image2'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('image2') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image3" class="col-form-label">Изображение 3</label>
                            <input id="image3" type="file" class="form-control{{ $errors->has('image3') ? ' is-invalid' : '' }}" name="image3" value="{{ old('image3', $products->image3) }}">
                            @if($products->image3)<img src="{{ Storage::url($products->image3) }}" alt="" style="width: 150px; height: 150px">@endif
                            @if ($errors->has('image3'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('image3') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image4" class="col-form-label">Изображение 4</label>
                            <input id="image4" type="file" class="form-control{{ $errors->has('image4') ? ' is-invalid' : '' }}" name="image4" value="{{ old('image4', $products->image4) }}">
                            @if($products->image4)<img src="{{ Storage::url($products->image4) }}" alt="" style="width: 150px; height: 150px">@endif
                            @if ($errors->has('image4'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('image4') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image5" class="col-form-label">Изображение 5</label>
                            <input id="image5" type="file" class="form-control{{ $errors->has('image5') ? ' is-invalid' : '' }}" name="image5" value="{{ old('image5', $products->image5) }}">
                            @if($products->image5)<img src="{{ Storage::url($products->image5) }}" alt="" style="width: 150px; height: 150px">@endif
                            @if ($errors->has('image5'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('image5') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image6" class="col-form-label">Изображение 6</label>
                            <input id="image6" type="file" class="form-control{{ $errors->has('image6') ? ' is-invalid' : '' }}" name="image6" value="{{ old('image6', $products->image6) }}">
                            @if($products->image6)<img src="{{ Storage::url($products->image6) }}" alt="" style="width: 150px; height: 150px">@endif
                            @if ($errors->has('image6'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('image6') }}</strong></span>
                            @endif
                        </div>                        
                        
                        <div class="form-group">
                            <label for="file" class="col-form-label">Драйвер</label>
                            <input id="file" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" value="{{ old('file', $products->file) }}">
                            @if ($errors->has('file'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('file') }}</strong></span>
                            @endif
                        </div>   
                        
                        <div class="form-group">
                            <label for="entityprice" class="col-form-label">Цена для юридических лиц</label>
                            <input id="entityprice" class="form-control{{ $errors->has('entityprice') ? ' is-invalid' : '' }}" name="entityprice" value="{{ old('entityprice', $products->entityprice) }}" required>
                            @if ($errors->has('entityprice'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('entityprice') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="individualprice" class="col-form-label">Цена для физических лиц</label>
                            <input id="individualprice" class="form-control{{ $errors->has('individualprice') ? ' is-invalid' : '' }}" name="individualprice" value="{{ old('individualprice', $products->individualprice) }}" required>
                            @if ($errors->has('individualprice'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('individualprice') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="techspec" class="col-form-label">Категория:</label>
                            <select name="techspec" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"{{ $category->id == old('category_id', $products->category_id) ? ' selected' : '' }}>
                                        @if($category->parent_id == null)
                                        Категория: {{ $category->name }}
                                        @else
                                            @if($category->parent_id == 2 )Платежные терминалы: {{ $category->parent_id }} {{ $category->name }}
                                            @elseif($category->parent_id == 3 )Комплектующие: {{ $category->parent_id }} {{ $category->name }}
                                            @else($category->parent_id == 26 )Запасные части: {{ $category->parent_id }} {{ $category->name }}@endif
                                        @endif
                                    </option>
                                @endforeach;
                                
                            </select>
                            @if ($errors->has('techspec'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('techspec') }}</strong></span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="valut" class="col-form-label">Валюта</label>
                            <select name="valut" class="form-control">
                                @if($products->valut==1)<option value="{{ old('valut', $products->valut) }}" selected>Доллар</option>
                                <option value="0">Тенге</option>
                                @else
                                <option value="1" >Доллар</option>
                                <option value="0" selected>Тенге</option>
                                @endif
                            </select>
                            @if ($errors->has('valut'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('valut') }}</strong></span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="is_active" class="col-form-label">Активный/Не активный</label>
                            {{--<input id="is_active" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }}" name="is_active" value="{{ old('is_active', $products->is_active) }}" required>--}}
                            <select name="is_active" class="form-control">
                                @if($products->is_active==1)<option value="{{ old('is_active', $products->is_active) }}" selected>Активный</option>
                                <option value="0">Не активный</option>
                                @else
                                <option value="1" >Активный</option>
                                <option value="0" selected>Не активный</option>
                                @endif
                            </select>
                            @if ($errors->has('is_active'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('is_active') }}</strong></span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="sell" class="col-form-label">Выводить в топ продаж</label>
                            {{--<input id="sell" class="form-control{{ $errors->has('sell') ? ' is-invalid' : '' }}" name="sell" value="{{ old('sell', $products->sell) }}">--}}
                            <select name="sell" class="form-control">
                                @if($products->sell==1)<option value="{{ old('sell', $products->sell) }}" selected>Активный</option>
                                <option value="0">Не активный</option>
                                @else
                                <option value="1" >Активный</option>
                                <option value="0" selected>Не активный</option>
                                @endif
                            </select>
                            @if ($errors->has('sell'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('sell') }}</strong></span>
                            @endif
                        </div>

                        {{--<div class="form-group">
                            <label for="parametr" class="col-form-label">Параметры</label>
                            <input id="parametr" class="form-control{{ $errors->has('parametr') ? ' is-invalid' : '' }}" name="parametr" value="{{ old('parametr', $products->techspec) }}" required>
                            @if ($errors->has('parametr'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('parametr') }}</strong></span>
                            @endif
                        </div>--}}

                        <button type="submit" class="btn btn-primary waves-effect">Обновить</button> <a class="btn btn-primary waves-effect" href="{{ route('products.index') }}">Назад</a>
                        </form>

                        {{--  Ryandev | Dynamically adding parameter buttons.  --}}
                        <hr>

                        <form method="POST" action="{{ route('editparameter') }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="container1 form-group">
                            <button class="add_form_field btn btn-primary waves-effect">Добавить новый параметр &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>

                            {{--  <div class="form-group"><input type="text" name="mytext[]" value="" class="form-control"><a href="#" class="delete btn btn-danger waves-effect">Delete</a></div>  --}}
                            <input type="hidden" name="product_id" value="{{ $id }}">
                            @foreach ($parameters as $item)
                            <div class="form-group conveniancecount"><input type="text" value="{{ $item->label }}" name="label[{{ $item->parameter_id }}]" value="" class="form-control"></div>
                            <div class="form-group conveniancecount"><input type="text" value="{{ $item->value }}" name="mytext[{{ $item->parameter_id }}]" value="" class="form-control"></div>
                            @endforeach


                        </div>

                        <div style="margin-bottom:20px;"><button type="submit" class="btn btn-primary waves-effect">Обновить Параметры</button></div>
                        </form>

                        <form method="POST" action="{{ route('clearparameter') }}"  enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="product_id" value="{{ $id }}">
                            <div><button type="submit" class="btn btn-primary waves-effect">Очистить Параметры</button></div>
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
