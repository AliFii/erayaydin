@extends("backend.layout.page")

@section("title") Eray Aydın - Sistem Ayarları @stop

@section("content-header") Sistem Ayarları @stop

@section("content-description") Sistem ayarlarını güncelleyin @stop

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sistem Ayarları</h3>
                </div>
                {!! Form::open(["route" => ["backend.settings.update"], "method" => "PUT", "role" => "form"]) !!}
                <div class="box-body">
                    @if($errors->has())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        {!! Form::label("site_name", "Site Başlığı") !!}
                        {!! Form::text("site_name", Settings::get('site_name'), ["class" => "form-control", "placeholder" => "Site başlığını belirtin."]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("site_subtitle", "Site Alt Başlığı") !!}
                        {!! Form::text("site_subtitle", Settings::get('site_subtitle'), ["class" => "form-control", "placeholder" => "Site alt başlığı belirtin."]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("site_description", "Site Açıklaması") !!}
                        {!! Form::textarea("site_description", Settings::get('site_description'), ["class" => "form-control", "placeholder" => "Site Açıklaması."]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("social_twitter", "Twitter Adresi") !!}
                        {!! Form::text("social_twitter", Settings::get('social_twitter'), ["class" => "form-control", "placeholder" => "http://"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("social_facebook", "Facebook Adresi") !!}
                        {!! Form::text("social_facebook", Settings::get('social_facebook'), ["class" => "form-control", "placeholder" => "http://"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("social_github", "Github Adresi") !!}
                        {!! Form::text("social_github", Settings::get('social_github'), ["class" => "form-control", "placeholder" => "http://"]) !!}
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