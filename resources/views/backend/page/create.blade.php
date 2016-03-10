@extends("backend.layout.page")

@section("title") Eray Aydın - Yeni Sayfa Ekle @stop

@section("content-header") Yeni Sayfa Ekle @stop

@section("content-description") @stop

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Yeni Sayfa Ekle</h3>
                </div>
                {!! Form::open(["route" => "backend.page.store", "role" => "form", "files" => true]) !!}
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
                            {!! Form::text("name", old("name"), ["class" => "form-control", "placeholder" => "Sayfa başlığı"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("subtitle", "Alt Başlık") !!}
                            {!! Form::text("subtitle", old("subtitle"), ["class" => "form-control", "placeholder" => "Sayfa alt başlığı"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("slug", "Bağlantı") !!}
                            {!! Form::text("slug", old("slug"), ["class" => "form-control", "placeholder" => "Sayfa bağlantısı"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("image", "Öne Çıkan Resim") !!}
                            {!! Form::file("image", ["class" => "form-control"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("content", "İçerik") !!}
                            {!! Form::textarea("content", old("content"), ["class" => "form-control simplemde"]) !!}
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

@section("plugin.css")
    <link rel="stylesheet" href="{{ asset("assets/plugins/simplemde/simplemde.css") }}">
@stop

@section("plugin.js")
    <script src="{{ asset("assets/plugins/simplemde/simplemde.js") }}"></script>
@stop

@section("page.js")
    <script>
        var simplemde = new SimpleMDE({ element: $(".simplemde")[0] });
    </script>
@stop