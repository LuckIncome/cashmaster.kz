<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Cash Master - Платежные Терминалы</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App Icons -->
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">
    <!-- Basic Css files -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
</head>
@if (Auth::user()->hasRole('administrator'))
<body class="fixed-left">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{ url('admin') }}" class="logo"><img src="{{ url('assets/images/logo.png') }}" alt="" height="35" class="logo-large"> <img src="{{ url('assets/images/logo-sm.png') }}" alt="" height="22" class="logo-sm"></a>
            </div>
            <nav class="navbar-custom">
                <!-- Search input -->
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <form method="GET" action="{{ route('cart.search2') }}">
                            <input type="text" name="q" placeholder="Найти ...">
                            <input type="submit" name="sear" class="sear">
                            {{-- <button type="submit">Search</button> --}}
                    </form>
                    </div>
                </div>
                <ul class="navbar-right d-flex list-inline float-right mb-0">
                    <li class="list-inline-item dropdown notification-list"><a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap"><i class="mdi mdi-magnify noti-icon"></i></a></li>
                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img src="{{ url('assets/images/users/avatar-6.jpg') }}" alt="user" class="rounded-circle"> <span class="d-none d-md-inline-block ml-1">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                            <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Профиль</a>
                            <div class="dropdown-divider"></div>
                            {{-- <a class="dropdown-item" href="#"><i class="dripicons-exit text-muted"></i>Выйти</a> --}}

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="dripicons-exit text-muted"></i>Выйти {{-- {{ __('Logout') }} --}}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect"><i class="mdi mdi-menu"></i></button>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Панель Управления</li>
                        @if (Auth::user()->hasRole('administrator'))
                        <li><a href="{{ url('admin') }}" class="waves-effect active"><i class="dripicons-meter"></i><span> Главная</span></a></li>
                        <li><a href="{{ url('admin/user') }}" class="waves-effect"><i class="dripicons-user-group"></i><span> Пользователи</span></a></li>
                        <li><a href="{{ url('admin/roles') }}" class="waves-effect"><i class="dripicons-user-id"></i><span> Роли и права доступа</span></a></li>
                        <li><a href="{{ url('admin/forms') }}" class="waves-effect"><i class="dripicons-toggles"></i><span>Заявки</span></a></li>
                        <li><a href="{{ url('admin/role_user') }}" class="waves-effect"><i class="dripicons-user-id"></i><span> Выдача прав</span></a></li>
                        <li><a href="{{ url('admin/categories') }}" class="waves-effect"><i class="dripicons-checklist"></i><span> Категорий</span></a></li>
                        <li><a href="{{ url('admin/products') }}" class="waves-effect"><i class="dripicons-store"></i><span> Товары</span></a></li>
                        {{-- <li><a href="{{ url('admin/article') }}" class="waves-effect"><i class="dripicons-store"></i><span> Артикл</span></a></li> --}}
                        {{--<li><a href="{{ url('admin/orders') }}" class="waves-effect"><i class="dripicons-cart"></i><span> Заказы</span></a></li>--}}
                        <li><a href="{{ url('admin/articles') }}" class="waves-effect"><i class="dripicons-information"></i><span>  Полезная информация</span></a></li>
                        <li><a href="{{ url('admin/reports') }}" class="waves-effect"><i class="dripicons-document"></i><span> Отчёты</span></a></li>
                        <li><a href="{{ url('admin/currency') }}" class="waves-effect"><i class="dripicons-wallet"></i><span> Настройка валюты</span></a></li>
                        <li><a href="{{ url('admin/otherpage') }}" class="waves-effect"><i class="dripicons-wallet"></i><span> Остальные страницы</span></a></li>
                        <li><a href="{{ url('admin/about') }}" class="waves-effect"><i class="dripicons-wallet"></i><span> О компании</span></a></li>
                        <li><a href="{{ url('admin/vacancy') }}" class="waves-effect"><i class="dripicons-wallet"></i><span> Вакансии</span></a></li>
                        <li><a href="{{ url('admin/partner') }}" class="waves-effect"><i class="dripicons-wallet"></i><span> Партнеры</span></a></li>
                        <li><a href="{{ url('admin/contacts') }}" class="waves-effect"><i class="dripicons-wallet"></i><span> Контакты</span></a></li>
                        <li><a href="{{ url('admin/gallery') }}" class="waves-effect"><i class="dripicons-wallet"></i><span> Галерея</span></a></li>
                        {{-- <li><a href="{{ url('admin/payment') }}" class="waves-effect"><i class="dripicons-to-do"></i><span> Настройка оплаты</span></a></li> 
                        <li><a href="{{ url('admin/settings') }}" class="waves-effect"><i class="dripicons-toggles"></i><span> Настройки</span></a></li>--}}
                        <li><a href="{{ url('admin/colleagues') }}" class="waves-effect"><i class="dripicons-toggles"></i><span>Сотрудники</span></a></li>
                        <li><a href="{{ url('admin/pictures') }}" class="waves-effect"><i class="dripicons-toggles"></i><span>Картинки для раздела О компании</span></a></li>
                        <li><a href="{{ url('admin/seo') }}" class="waves-effect"><i class="dripicons-toggles"></i><span>SEO</span></a></li>
                        @endif
                    </ul>
                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            @yield('content')
            <footer class="footer">© 2018 IMarketing - <a href="/">Cashmaster.kz</span>
            </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <!-- jQuery  -->
    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ url('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ url('assets/js/waves.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <!-- App js -->

    <script>
            $('#summernote').summernote({
              placeholder: 'Hello stand alone ui',
              tabsize: 2,
              height: 100
            });
          </script>
    <script src="{{ url('assets/js/app.js') }}"></script>
</body>
@else
<body>
    <div>У вас нету прав</div>
</body>
@endif

</html>
