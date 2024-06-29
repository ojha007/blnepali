<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Preeti to Nepali Unicode Converter</title>
    <meta name="keywords" content="BL media Unicode Nepali Devanagari Roman Typing Keyboard">
    <meta name="keywords" content="BreakNLinks">
    <meta name="description" content="BL media language convertor">
    <meta name="author" content="Bl Media">
    <meta name="ROBOTS" content="ALL">
    <meta name="Googlebot" content="index, follow">
    <meta name="distribution" content="Global">
    <meta name="document-type" content="web page">
    <meta name="resource-type" content="document">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="{{asset('/frontend/unicode/css/uikit.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/masterLayout.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <script src="{{'/frontend/unicode/js/jquery.min.js'}}"></script>
    <script src="{{'/frontend/unicode/js/uikit-icons.min.js'}}"></script>
    <script src="{{asset('/frontend/unicode/js/uikit.min.js')}}"></script>

    @stack('scripts')
</head>
<body>
@include('frontend.unicode.partials.header')
<div class="uk-container-center">
    @yield('content')
</div>

</body>
</html>
