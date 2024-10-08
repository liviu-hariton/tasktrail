<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TaskTrail | Leave no task uncharted</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ secure_asset('assets/css/backend-plugin.min.css') }}">

    <link rel="stylesheet" href="{{ secure_asset('assets/css/backend.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/remixicon/fonts/remixicon.css') }}">

    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css') }}">

    @include('components.general.favicon')

    <script>
        const _locale = '{{ str_replace('_', '-', app()->getLocale()) }}';
    </script>

    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
</head>

<body>
<div id="loading">
    <div id="loading-center"></div>
</div>

<div class="wrapper">
    @yield('content')
</div>

<script src="{{ secure_asset('assets/js/backend-bundle.min.js') }}"></script>
<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
<script src="{{ secure_asset('assets/js/table-treeview.js') }}"></script>
<script src="{{ secure_asset('assets/js/customizer.js') }}"></script>
<script async src="{{ secure_asset('assets/js/chart-custom.js') }}"></script>
<script async src="{{ secure_asset('assets/js/slider.js') }}"></script>
<script src="{{ secure_asset('assets/js/app.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/moment.min.js') }}"></script>

@stack('scripts')
</body>
</html>
