@extends("backend.layout.page")

@section("title") Eray Aydın - '{{ $page->name }}' Sayfasını Düzenle @stop

@section("content-header") '{{ $page->name }}' Sayfasını Düzenle @stop

@section("content-description") @stop

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">'{{ $page->name }}' Sayfasını Düzenle</h3>
                </div>
                {!! Form::open(["route" => ["backend.page.update", $page->slug], "method" => "PUT", "role" => "form", "files" => true]) !!}
                {!! Form::hidden("id", $page->id) !!}
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
                            {!! Form::text("name", $page->name, ["class" => "form-control", "placeholder" => "Sayfa başlığı"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("subtitle", "Alt Başlık") !!}
                            {!! Form::text("subtitle", $page->subtitle, ["class" => "form-control", "placeholder" => "Sayfa alt başlığı"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("slug", "Bağlantı") !!}
                            {!! Form::text("slug", $page->slug, ["class" => "form-control", "placeholder" => "Sayfa bağlantısı"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("image", "Öne Çıkan Resim") !!}
                            {!! Form::file("image", ["class" => "form-control"]) !!}
                            <span class="help-block">Değiştirmek istemiyorsanız boş bırakın.</span>
                        </div>
                        <div class="form-group">
                            {!! Form::label("content", "İçerik") !!}
                            {!! Form::textarea("content", $page->content, ["class" => "form-control"]) !!}
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {!! Form::submit("Güncelle", ["class" => "btn btn-primary"]) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
