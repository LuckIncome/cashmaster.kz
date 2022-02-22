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
                        <h4 class="mt-0 header-title">Данные пользователя "{{ $collection->name }}"</h4>
                        <p class="text-muted m-b-30 font-14">Данные пользователя.</p>

                        <form action="{{ route('user.update', $collection->id) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Отображаемое имя</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->name }}" id="username" name="username"></div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Имя</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->firstname }}" id="firstname" name="firstname"></div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Фамилия</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->lastname }}" id="lastname" name="lastname"></div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Отчество</label>
                            <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->middlename }}" id="middlename" name="middlename"></div>
                        </div>

                        <div class="form-group row">
                                <label for="useremail" class="col-sm-2 col-form-label">Почта</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->email }}" id="useremail" name="useremail"></div>
                        </div>

                        <div class="form-group row">
                                <label for="usercompanyname" class="col-sm-2 col-form-label">Наименование организации</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->companyname }}" id="usercompanyname" name="usercompanyname"></div>
                        </div>

                        <div class="form-group row">
                                <label for="userinnbin" class="col-sm-2 col-form-label">ИИН/БИН</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->innbin }}" id="userinnbin" name="userinnbin"></div>
                        </div>

                        <div class="form-group row">
                                <label for="userphone" class="col-sm-2 col-form-label">Телефон</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->phone }}" id="userphone" name="userphone"></div>
                        </div>

                        <div class="form-group row">
                                <label for="useraddress" class="col-sm-2 col-form-label">Адрес</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->address }}" id="useraddress" name="useraddress"></div>
                        </div>

                        <div class="form-group row">
                                <label for="userrole" class="col-sm-2 col-form-label">Роль</label>
                                <div class="col-sm-10">
                                    {{--<input class="form-control" type="text" value="{{ $collection->role }}" id="userrole" name="userrole">--}}
                                    @foreach($roles as $role)
                                        <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                        @if($user->roles->where('id', $role->id)->count()) 
                                        checked="checked"
                                        @endif
                                        >
                                        <label>{{ucfirst($role->name)}}</label>
                                    @endforeach
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="useremail_verified_at" class="col-sm-2 col-form-label">Верификация</label>
                                <div class="col-sm-10"><input class="form-control" type="text" value="{{ $collection->email_verified_at }}" id="useremail_verified_at" name="useremail_verified_at"></div>
                        </div>
                        @foreach ($user->roles as $role)
                            {{$role->name}}
                        @endforeach

                        <button type="submit" class="btn btn-primary waves-effect">Обновить</button> <a class="btn btn-primary waves-effect" href="{{ route('user.index') }}">Назад</a>
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