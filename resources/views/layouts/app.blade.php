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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="{{ secure_asset('js/profile_img_change.js') }}" defer></script>
    <script src="{{ secure_asset('js/like.js') }}" defer></script>
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/apptop.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/islandtop.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/detail.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/mypage.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/mypagedetail.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/create.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/search.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/change.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <a href="/top">
    <div class="header">
        <div class="logo">
                <img src="{{ asset('storage/logo.png') }}" alt="ロゴ">
        </div>
    </a>
    
        <div class="nav">
            <input id="drawer_input" class="drawer_hidden" type="checkbox">
            <label for="drawer_input" class="drawer_open"><span></span></label>
            <nav class="nav_content">
            <ul class="nav_list">
                <li class="nav_item"><a href="{{ url('/top') }}">伊豆諸島一覧</a></li>
                @guest
                <li class="nav_item"><a href="{{ route('login') }}">ログイン</a></li>
                @else
                <li class="nav_item"><a href="{{ url('/island/photo/search') }}">画像検索</a></li>
                <li class="nav_item"><a href="{{ url('/island/photo/create') }}">新規作成</a></li>
                <li class="nav_item"><a href="{{ route('mypage.index') }}">マイページ</a></li>
                <li class="nav_item">
                    <form action="{{ route('logout') }}" method="post">
                      @csrf
                      <input type="submit" value="ログアウト" class="logout">
                    </form>
                </li>
                @endguest
            </ul>
            </nav>
        </div>
    <div class="footer">
    </div>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>