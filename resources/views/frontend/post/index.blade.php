@extends("frontend.layouts.master")

@section("container")
<header class="intro-header" style="background-image: url('http://www.designerresource.org/wp-content/uploads/2014/04/Free-Polygonal.png')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>{{ Settings::get("site_name") }}</h1>
                    <hr class="small">
                    <span class="subheading">
                        {{ Settings::get("site_subtitle") }}<br>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="{{ route("frontend.post.show", $post->slug) }}">
                        <h2 class="post-title">
                            {{ $post->name }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->subtitle }}
                        </h3>
                    </a>
                    <p class="post-meta">{{ $post->created_at->format("d.m.Y") }}</p>
                </div>
                <hr>
            @endforeach

            {!! $posts->render() !!}
        </div>
    </div>
</div>

<hr>
@stop