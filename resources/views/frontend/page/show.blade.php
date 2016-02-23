@extends("frontend.layouts.master")

@section("container")
    <header class="intro-header" style="background-image: url('{{ asset($page->image) }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>{{ $page->name }}</h1>
                        <h2 class="subheading">{{ $page->subtitle }}</h2>
                        <span class="meta">{{ $page->created_at->format("d.m.Y") }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! $page->content !!}
            </div>
        </div>
    </div>

    <hr>
@stop