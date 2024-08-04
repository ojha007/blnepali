<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="https://breaknlinks.com/images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="title" content="Media for all across the globe">
    <meta name="description" content="Media for all across the globe">
    <meta name="keywords" content="{{ isset($allCategories)? $allCategories->implode(','):''}}">
    @hasSection('title')
        <title>@yield('title')</title>
    @else
        <title> {{setting('slogan') ?? 'Media for all across the globe'}}</title>
    @endif
    @hasSection('meta')
        @yield('meta')
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
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    {{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('frontend/fontawesome/css/all.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}" type="text/css"/>
</head>
<body>
@include('frontend.layouts.header')
@yield('content')
@include('frontend.layouts.footer')
<script type="text/javascript" src="{{asset('frontend/js/app.js')}}"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
></script>
{{-- <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=628fa698b2339200190e6254&product=sop'
        async='async'></script> --}}
<script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=669b3523595beb00197dfa96&product=inline-share-buttons'
        async='async'></script>
</body>
</html>
