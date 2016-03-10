<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield("description")">
    <meta name="author" content="Eray Aydın <eray@webjektif.com>">
    <title>@yield("title")</title>

    <!-- Custom CSS -->
    <link href="{{ asset("assets/css/app.css") }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/js/ie8.js') }}"></script>
    <![endif]-->
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-menu">
                <span class="sr-only">Menüyü Aç</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route("frontend.post.index") }}">{{ Settings::get("site_name") }}</a>
        </div>

        <div class="collapse navbar-collapse" id="primary-menu">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route("frontend.post.index") }}">Anasayfa</a>
                </li>
                @foreach(\App\Page::all() as $page)
                    <li>
                        <a href="{{ route("frontend.page.show", $page->slug) }}">{{ $page->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

@yield("container")

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    @if(Settings::get("social_twitter"))
                    <li>
                        <a href="{{ Settings::get("social_twitter") }}">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    @endif
                    @if(Settings::get("social_facebook"))
                    <li>
                        <a href="{{ Settings::get("social_facebook") }}">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    @endif
                    @if(Settings::get("social_github"))
                    <li>
                        <a href="{{ Settings::get("social_github") }}">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    @endif
                </ul>
                <p class="copyright text-muted">Copyright &copy; Eray Aydın 2016</p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset("assets/js/app.js") }}"></script>
</body>
</html>