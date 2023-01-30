<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="https://breaknlinks.com/images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Media for all across the globe">
    <meta name="description" content="Media for all across the globe">
    <meta name="keywords" content="{{ isset($allCategories)? $allCategories->implode(','):''}}">
    @yield('title')
    <title>
        {{setting('slogan')}}
    </title>
    @isset($news)
        @stack('meta')
    @else
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:url" content="https://breaknlinks.com/nepali"/>
        <meta name="twitter:title" content="Breaknlinks"/>
        <meta name="twitter:description" content="Media for all across the globe"/>
        <meta name="twitter:image:src" content="https://breaknlinks.com/frontend/img/logo.png"/>
        <meta property="og:title" content="Breaknlinks"/>
        <meta property="og:type" content="article"/>
        <meta property="og:description" content="Media for all across the globe"/>
        <meta property="og:image" content="https://breaknlinks.com/frontend/img/logo.png"/>
        <meta property="og:url" content="https://breaknlinks.com/nepali"/>
        <meta content="1200" property="og:image:width"/>
        <meta content="800" property="og:image:height"/>
        <meta content="2197466943852133" property="fb:app_id"/>
        <meta content="" property="fb:pages"/>
        <meta content="" property="fb:admins"/>
    @endif
    <link rel="stylesheet" href="{{asset('frontend/np/bootstrap/css/bootstrap.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('frontend/np/fontawesome/css/all.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('frontend/np/owl-carousel/css/owl.carousel.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('frontend/np/owl-carousel/css/owl.theme.default.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('frontend/np/css/language-switcher.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('frontend/np/css/main.css')}}" type="text/css"/>
</head>
<body>
@include('frontend.layouts.header')
@yield('content')
@include('frontend.layouts.footer')
<script type="text/javascript" src="{{asset('frontend/np/js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/np/bootstrap/js/bootstrap.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/np/js/library/language-switcher.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/np/owl-carousel/js/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/np/js/library/loadScript.js')}}"></script>

</body>
</html>