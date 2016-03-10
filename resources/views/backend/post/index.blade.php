@extends("backend.layout.page")

@section("title") Eray Aydın - Yazılar @stop

@section("content-header") Yazılar @stop

@section("content-description") Kayıtlı yazı listesi @stop

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Yazılar</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route("backend.post.create") }}" class="btn btn-success">Yeni Yazı Ekle <i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Alt Başlık</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->subtitle }}</td>
                                <td>
                                    <a href="{{ route("frontend.post.show", $post->slug) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Görüntüle</a>
                                    <a href="{{ route("backend.post.edit", $post->slug) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Düzenle</a>
                                    <a href="{{ route("backend.post.destroy", $post->slug) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Sil</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $posts->render() !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
