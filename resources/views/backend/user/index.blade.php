@extends("backend.layout.page")

@section("title") Eray Aydın - Kullanıcılar @stop

@section("content-header") Kullanıcılar @stop

@section("content-description") Kayıtlı kullanıcı listesi @stop

@section("content")
    <div class="row">
        @foreach($users as $user)
        <div class="col-md-4">
            <a href="{{ route("backend.user.edit", $user->id) }}" class="box box-widget widget-user-2">
                <div class="widget-user-header bg-red">
                    <div class="widget-user-image">
                        <img class="img-circle" src="https://api.adorable.io/avatars/128/{{ $user->email }}" alt="{{ $user->name }}">
                    </div>
                    <h3 class="widget-user-username">{{ $user->name }}</h3>
                    <h5 class="widget-user-desc">{{ $user->email }}</h5>
                </div>
            </a>
        </div>
        @endforeach
        <div class="col-md-4">
            <a href="{{ route("backend.user.create") }}" class="btn btn-lg btn-success"><i class="fa fa-user-plus"></i> Yeni Kullanıcı</a>
        </div>
    </div>
@stop
