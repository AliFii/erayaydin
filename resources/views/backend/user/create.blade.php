@extends("backend.layout.page")

@section("title") Eray Aydın - Yeni Kullanıcı @stop

@section("content-header") Yeni Kullanıcı @stop

@section("content-description") Yeni kullanıcı ekleme @stop

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Yeni Kullanıcı Ekle</h3>
                </div>
                {!! Form::open(["route" => "backend.user.store", "role" => "form"]) !!}
                    <div class="box-body">
                        @if($errors->has())
                            <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                            </div>
                        @endif
                        <div class="form-group">
                            {!! Form::label("name", "Ad Soyad") !!}
                            {!! Form::text("name", old("name"), ["class" => "form-control", "placeholder" => "Ad Soyad Giriniz..."]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("email", "E-Posta") !!}
                            {!! Form::email("email", old("email"), ["class" => "form-control", "placeholder" => "E-Posta Adresi giriniz..."]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("password", "Şifre") !!}
                            {!! Form::password("password", ["class" => "form-control", "placeholder" => "Şifre giriniz..."]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("password_confirmation", "Şifre Tekrarı") !!}
                            {!! Form::password("password_confirmation", ["class" => "form-control", "placeholder" => "Şifre tekrarı giriniz..."]) !!}
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {!! Form::submit("Ekle", ["class" => "btn btn-success"]) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
