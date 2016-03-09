@extends("backend.layout.master")

@section('bodyclass') hold-transition skin-blue sidebar-mini @stop

@section("body")
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route("backend.dashboard.index") }}" class="logo">
            <span class="logo-mini"><b>E</b>A</span>
            <span class="logo-lg"><b>Eray</b>Aydın</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Menüyü Aç</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="https://api.adorable.io/avatars/285/{{ auth()->user()->email }}" class="user-image" alt="{{ auth()->user()->name }}">
                            <span class="hidden-xs">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="https://api.adorable.io/avatars/160/{{ auth()->user()->email }}" class="img-circle" alt="{{ auth()->user()->name }}">
                                <p>
                                    {{ auth()->user()->name }}
                                    <small>{{ auth()->user()->email }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route("backend.user.edit", auth()->user()->id) }}" class="btn btn-default btn-flat">Hesap Ayarları</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route("backend.user.logout") }}" class="btn btn-default btn-flat">Çıkış</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="https://api.adorable.io/avatars/160/{{ auth()->user()->email }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ auth()->user()->name }}</p>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="header">WEBSITE</li>
                <li @if(\Request::is(config("app.backend"))) class="active" @endif>
                    <a href="{{ route("backend.dashboard.index") }}">
                        <i class="fa fa-dashboard"></i> <span>Pano</span>
                    </a>
                </li>
                <li class="header">SİSTEM</li>
                <li @if(\Request::is(config("app.backend")."/user*")) class="active" @endif>
                    <a href="{{ route("backend.user.index") }}">
                        <i class="fa fa-users"></i> <span>Kullanıcı Yönetimi</span>
                    </a>
                </li>
            </ul>
        </section>
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield("content-header")
                <small>@yield("content-description")</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            @yield("content")

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Versiyon</b> {{ config("app.version") }}
        </div>
        <strong>Copyright &copy; {{ date("Y") }} <a href="http://erayaydin.org">Eray Aydın</a>.</strong> Tüm Hakkı Saklıdır.
    </footer>
</div>
<!-- ./wrapper -->
@stop