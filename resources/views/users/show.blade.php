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
                                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Пользователи</a></li>
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
                        <h4 class="mt-0 header-title">Данные пользователя "{{ $collection->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные пользователя.</p>

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Отображаемое имя</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->name }}" id="username" disabled></div>
                        </div>

                        <div class="form-group row">
                            <label for="userfullname" class="col-sm-2 col-form-label">ФИО</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->firstname }} {{ $collection->lastname }} {{ $collection->middlename }}" id="userfullname" disabled></div>
                        </div>

                        <div class="form-group row">
                                <label for="useremail" class="col-sm-2 col-form-label">Почта</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->email }}" id="useremail" disabled></div>
                        </div>

                        <div class="form-group row">
                                <label for="usercompanyname" class="col-sm-2 col-form-label">Наименование организации</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->companyname }}" id="usercompanyname" disabled></div>
                        </div>

                        <div class="form-group row">
                                <label for="userinnbin" class="col-sm-2 col-form-label">ИИН/БИН</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->innbin }}" id="userinnbin" disabled></div>
                        </div>

                        <div class="form-group row">
                                <label for="userphone" class="col-sm-2 col-form-label">Телефон</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->phone }}" id="userphone" disabled></div>
                        </div>

                        <div class="form-group row">
                                <label for="useraddress" class="col-sm-2 col-form-label">Адрес</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->address }}" id="useraddress" disabled></div>
                        </div>

                        <div class="form-group row">
                                <label for="userrole" class="col-sm-2 col-form-label">Роль</label>
                                <div class="col-sm-10">
                                    {{--<input class="form-control" type="text" value="{{ $collection->role }}" id="userrole" disabled>--}}
                                    @foreach($roles as $role)
                                        <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                        @if($user->roles->where('id', $role->id)->count()) 
                                        checked="checked"
                                        @endif
                                        disabled>
                                        <label>{{ucfirst($role->name)}}</label>
                                    @endforeach
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="useremail_verified_at" class="col-sm-2 col-form-label">Верификация</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->email_verified_at }}" id="useremail_verified_at" disabled></div>
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