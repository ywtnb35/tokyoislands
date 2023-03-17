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
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/islandtop.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="inner">
            <div class="logo">
                <img src="logo" alt="ロゴ">
            </div>
        </div>
        
   <nav>
       <div class="col-md-8 mx-right">
           <div class="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <li><a href="#">伊豆諸島一覧</a></li>
                <li><a href="#">新規作成</a></li>
                <li><a href="#">マイページ</a></li>
                <li><a href="#">ログアウト</a></li>
            </ul>
        </div>
    </nav>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
