@extends("backend.layout.master")

@section('bodyclass') hold-transition login-page @stop

@section("title") Eray Aydın - Giriş Yap @stop

@section("body")
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}"><b>Eray</b>Aydın</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Yönetim paneli için lütfen giriş yapın</p>
            @if($errors->has())
                <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
                </div>
            @endif
            {!! Form::open(["route" => "backend.user.login"]) !!}
                <div class="form-group has-feedback">
                    {!! Form::email("email", old("email"), ["class" => "form-control", "placeholder" => "E-Posta Adresi"]) !!}
                    <span class="fa fa-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {!! Form::password("password", ["class" => "form-control", "placeholder" => "Şifreniz"]) !!}
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                {!! Form::checkbox("remember", true, old("remember")) !!}
                                Beni Hatırla
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        {!! Form::submit("Giriş Yap", ["class" => "btn btn-primary btn-block btn-flat"]) !!}
                    </div>
                    <!-- /.col -->
                </div>
            {!! Form::close() !!}

        </div>
        <!-- /.login-box-body -->
    </div>
@stop

@section("plugin.css")
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck/icheck.css') }}">
@stop

@section("plugin.js")
    <script src="{{ asset('assets/plugins/icheck/icheck.js') }}"></script>
@stop

@section("page.js")
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@stop