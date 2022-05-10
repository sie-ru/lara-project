<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('css/home.css')}}" rel="stylesheet">
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
    <link href="{{ asset('css/author.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('css/error.css') }}" rel="stylesheet">
    <link href="{{ asset('css/detail-page.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <title>@yield('title') | Microblog.</title>
</head>
<body>
    <x-preloader />

    <x-navbar />

    @yield('body')















<script src="{{ asset('js/common_scripts.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/common_func.js') }}"></script>
<script src="{{ asset('js/carousel-home.js') }}"></script>
<script src="{{ asset('js/sticky_sidebar.min.js') }}"></script>
<script>
    (function ($) {
        "use strict";
        $('#sidebar_fixed').theiaStickySidebar({
            minWidth: 991,
            updateSidebarHeight: false,
            additionalMarginTop: 135
        });
    })(window.jQuery);
</script>
</body>
</html>
