@extends("backend.layout.page")

@section("title") Eray Aydın - Sayfalar @stop

@section("content-header") Sayfalar @stop

@section("content-description") Kayıtlı sayfa listesi @stop

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Sayfalar</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route("backend.page.create") }}" class="btn btn-success">Yeni Sayfa Ekle <i class="fa fa-plus"></i></a>
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
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->name }}</td>
                                <td>{{ $page->subtitle }}</td>
                                <td>
                                    <a href="{{ route("frontend.page.show", $page->slug) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Görüntüle</a>
                                    <a href="{{ route("backend.page.edit", $page->slug) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Düzenle</a>
                                    <a href="{{ route("backend.page.destroy", $page->slug) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Sil</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $pages->render() !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
