<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield("title")</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('assets/css/backend.css') }}">

    <!-- Plugins -->
    @yield("plugin.css")

    <!--[if lt IE 9]>
    <script src="{{ asset('assets/js/ie8.js') }}"></script>
    <![endif]-->
</head>
<body class="@yield('bodyclass')">
@yield("body")

<script src="{{ asset('assets/js/backend.js') }}"></script>

<!-- Plugin Scripts -->
@yield("plugin.js")

<!-- Page Scripts -->
@yield("page.js")
</body>
</html>