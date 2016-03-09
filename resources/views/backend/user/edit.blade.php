@extends("backend.layout.page")

@section("title") Eray Aydın - '{{ $user->name }}' Kullanıcısını Düzenle @stop

@section("content-header") '{{ $user->name }}' Kullanıcısını Düzenle @stop

@section("content-description") @stop

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">'{{ $user->name }}' Kullanıcısını Düzenle</h3>
                </div>
                {!! Form::open(["route" => ["backend.user.update", $user->id], "method" => "PUT", "role" => "form"]) !!}
                {!! Form::hidden("id", $user->id) !!}
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
                            {!! Form::text("name", $user->name, ["class" => "form-control", "placeholder" => "Ad Soyad Giriniz..."]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("email", "E-Posta") !!}
                            {!! Form::email("email", $user->email, ["class" => "form-control", "placeholder" => "E-Posta Adresi giriniz..."]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("password", "Şifre") !!}
                            {!! Form::password("password", ["class" => "form-control", "placeholder" => "Şifre giriniz..."]) !!}
                            <span class="help-block">Güncellemek istemiyorsanız boş bırakınız.</span>
                        </div>
                        <div class="form-group">
                            {!! Form::label("password_confirmation", "Şifre Tekrarı") !!}
                            {!! Form::password("password_confirmation", ["class" => "form-control", "placeholder" => "Şifre tekrarı giriniz..."]) !!}
                            <span class="help-block">Güncellemek istemiyorsanız boş bırakınız.</span>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {!! Form::submit("Güncelle", ["class" => "btn btn-primary"]) !!}
                        @if(auth()->user() != $user)
                            <a href="{{ route("backend.user.destroy", $user->id) }}" class="btn btn-danger">Sil <i class="fa fa-trash-o"></i></a>
                        @endif
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
