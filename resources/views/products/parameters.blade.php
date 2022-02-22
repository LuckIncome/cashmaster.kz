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
                                    <li class="breadcrumb-item"><a href="/admin/produts/{{$product->id}}/edit">
                                            {{\Illuminate\Support\Str::limit($product->name,45, '...')}}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Параметры</li>
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
                        <h4 class="mt-0 header-title">Параметры товара "{{ \Illuminate\Support\Str::limit($product->name,45, '...') }}"</h4>

                        @if(Session::has('Added'))
                            <div class="alert alert-success">Параметр успешно добавлен</div>
                        @endif

                        @if(Session::has('Updated'))
                            <div class="alert alert-success">Параметр успешно обновлен</div>
                        @endif

                        @if(Session::has('Deleted'))
                            <div class="alert alert-danger">Параметр успешно удален</div>
                        @endif

                        <table class="table table-bordered table-striped table-condensed">
                            <tr>
                                <td>
                                    <div style="width: 35%; display: inline-block; padding: 0 5px;">Название параметра</div>
                                    <div style="width: 45%; display: inline-block; padding: 0 5px;">Значение параметра</div>
                                </td>
                            </tr>
                            @if($parameters->count() == 0)
                                <tr>
                                    <td>
                                        Нет параметров
                                    </td>
                                </tr>
                            @endif
                            @foreach($parameters as $p)
                                <tr>
                                    <td>
                                        <form action="/admin/products/{{$product->id}}/parameters/{{$p->id}}/update" method="post">
                                            {!! csrf_field() !!}
                                            <div style="width: 35%; display: inline-block; padding: 0 5px;">
                                                <input type="text" class="form-control" name="val" value="{{$p->value}}" required>
                                            </div>
                                            <div style="width: 45%; display: inline-block; padding: 0 5px;">
                                                <input type="text" class="form-control" name="label" value="{{$p->label}}" required>
                                            </div>
                                            <div style="display: inline-block; padding: 0 5px;">
                                                <button type="submit" name="metod" value="update" class="btn btn-info btn-sm">
                                                    Обновить
                                                </button>
                                                <button type="submit" name="metod" value="delete" class="btn btn-danger btn-sm">
                                                    Удалить
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <form action="/admin/products/{{$product->id}}/parameters" method="post">
                                        {!! csrf_field() !!}
                                        <div style="width: 35%; display: inline-block; padding: 0 5px;">
                                            <input type="text" class="form-control" name="val" placeholder="Название параметра" required>
                                        </div>
                                        <div style="width: 45%; display: inline-block; padding: 0 5px;">
                                            <input type="text" class="form-control" name="label" placeholder="Значение параметра" required>
                                        </div>
                                        <div style="display: inline-block; padding: 0 5px;">
                                            <button type="submit" name="metod" value="update" class="btn btn-success btn-sm">
                                                Добавить
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
@endsection
