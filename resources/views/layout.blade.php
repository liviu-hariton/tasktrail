<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('meta-title') | {{ config('app.name') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ secure_asset('assets/css/backend-plugin.min.css') }}">

    <link rel="stylesheet" href="{{ secure_asset('assets/css/backend.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/flag-icons/css/flag-icons.min.css') }}">

    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/select2/dist/css/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ secure_asset('assets/css/custom.css') }}">

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
    @include('components.general.menu')

    @include('components.general.topbar')

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ secure_asset('assets/js/backend-bundle.min.js') }}"></script>
<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
<script src="{{ secure_asset('assets/js/table-treeview.js') }}"></script>
<script src="{{ secure_asset('assets/js/customizer.js') }}"></script>
<script async src="{{ secure_asset('assets/js/chart-custom.js') }}"></script>
<script async src="{{ secure_asset('assets/js/slider.js') }}"></script>
<script src="{{ secure_asset('assets/js/app.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/moment.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/blockui/blockui.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/select2/dist/js/i18n/'.str_replace('_', '-', app()->getLocale()).'.js') }}"></script>

<script src="{{ secure_asset('assets/js/tasktrail.js') }}"></script>
<script src="{{ secure_asset('assets/js/tasktrail_xhr.js') }}"></script>

@stack('scripts')

@auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endauth
</body>
</html>
