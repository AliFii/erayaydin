@extends("backend.layout.page")

@section("title") Eray Aydın - Yeni Yazı Ekle @stop

@section("content-header") Yeni Yazı Ekle @stop

@section("content-description") @stop

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Yeni Yazı Ekle</h3>
                </div>
                {!! Form::open(["route" => "backend.post.store", "role" => "form", "files" => true]) !!}
                    <div class="box-body">
                        @if($errors->has())
                            <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                            </div>
                        @endif
                        <div class="form-group">
                            {!! Form::label("name", "Başlık") !!}
                            {!! Form::text("name", old("name"), ["class" => "form-control", "placeholder" => "Yazı başlığı"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("subtitle", "Alt Başlık") !!}
                            {!! Form::text("subtitle", old("subtitle"), ["class" => "form-control", "placeholder" => "Yazı alt başlığı"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("slug", "Bağlantı") !!}
                            {!! Form::text("slug", old("slug"), ["class" => "form-control", "placeholder" => "Yazı bağlantısı"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("image", "Öne Çıkan Resim") !!}
                            {!! Form::file("image", ["class" => "form-control"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("content", "İçerik") !!}
                            {!! Form::textarea("content", old("content"), ["class" => "form-control"]) !!}
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
