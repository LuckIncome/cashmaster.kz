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
                            <h4 class="page-title mb-0">Товары</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Cashmaster</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Товары</a></li>
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
                        <h4 class="mt-0 header-title">Данные товара "{{ $product->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные товара.</p>

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Отображаемое имя товара</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $product->name }}" id="username" disabled></div>
                        </div>

                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Описание</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $product->description }}" id="userfullname" disabled></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 form-group row image-product">
                                <div class="">
                                    <div>Главное изображение</div>
                                    {{--<label for="userfullname" class="col-sm-2 col-form-label">Главное изображение</label>--}}                                
                                    <img src="{{ Storage::url($product->image) }}" style="width:200px;height:200px" alt="{{ $product->name }}">
                                </div>
                                <div class="">
                                    <div>Изображение 1</div>
                                    {{--<label for="userfullname" class="col-sm-2 col-form-label">Изображение </label>--}}                                
                                    <img src="{{ Storage::url($product->image1) }}" style="width:200px;height:200px" alt="{{ $product->name }}">
                                </div>
                                <div class="">
                                    <div>Изображение 2</div>
                                    {{--<label for="userfullname" class="col-sm-2 col-form-label">Изображение </label>--}}                                
                                    <img src="{{ Storage::url($product->image2) }}" style="width:200px;height:200px" alt="{{ $product->name }}">
                                </div>
                                <div class="">
                                    <div>Изображение 3</div>
                                    {{--<label for="userfullname" class="col-sm-2 col-form-label">Изображение </label>--}}                                
                                    <img src="{{ Storage::url($product->image3) }}" style="width:200px;height:200px" alt="{{ $product->name }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Цена для юридических лиц</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $product->individualprice }} $" id="userfullname" disabled></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Цена для физических лиц</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $product->entityprice }} $" id="userfullname" disabled></div>                            
                        </div>
                        
                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Актуальный</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $product->is_active }}" id="userfullname" disabled></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Вывод в топ продаж</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="@if($product->sell == null) Нет @else Да @endif" id="userfullname" disabled></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">Техническая характеристика</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $product->techspec }}" id="userfullname" disabled></div>
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