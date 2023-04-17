<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="{{ secure_asset('js/nav.js') }}"></script>
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/apptop.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/islandtop.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/detail.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/mypage.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/create.css') }}" rel="stylesheet">
</head>
<body>
<body>
    <div class="header">
        <div class="logo">
                <img src="{{ asset('storage/logo.png') }}" alt="ロゴ">
        </div>
        
        <div class="navArea">
            <nav>
                <div class="inner">
                    <ul>
                        <li><a href="{{ url('/top') }}">伊豆諸島一覧</a></li>
                        <li><a href="{{ url('/island/photo/create') }}">新規作成</a></li>
                        <li><a href="{{ url('mypage') }}">マイページ</a></li>
                        <li><a href="{{ url('') }}">ログアウト</a></li>
                    </ul>
                </div>
            </nav>
            <div class="toggle-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
