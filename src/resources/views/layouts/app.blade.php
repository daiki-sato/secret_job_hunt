<html>

<head>
    <link href={{ asset('/img/logo.png') }} rel="shortcut icon">
    <meta http-equiv="content-type" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Anovey</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/index.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('scripts')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>
    @section('header')
        <nav class="navbar sticky-top navbar-expand-sm navbar-green shadow-sm bg-body">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
                Anovey<span class="sub-title">匿名転職相談サービス</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4"
                aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="material-icons icon-white">dehaze</i></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav4">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('schedule') }}"
                                class="nav-link px-5 ml-3 shadow-sm bg-body rounded header_item">予約一覧</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('thread') }}"
                                class="nav-link px-5 ml-3 shadow-sm bg-body rounded header_item">スレッドへ</a>
                        </li>
                        @if (Auth::user()->role_id === 2)
                            <li class="nav-item">
                                <a href="{{ route('search') }}"
                                    class="nav-link px-5 ml-3 shadow-sm bg-body rounded header_item">検索画面へ</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('my-page') }}"
                                class="nav-link px-5 ml-3 shadow-sm bg-body rounded header_item">マイページへ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}"
                                class="nav-link px-5 ml-3 shadow-sm bg-body rounded header_item">ログアウト</a>
                        </li>
                        @if (Auth::user()->role_id === 1)
                            <li class="nav-item">
                                <a href="{{ route('admin') }}"
                                    class="nav-link px-5 ml-3 shadow-sm bg-body rounded header_item">管理画面へ</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}"
                                    class="nav-link px-5 ml-3 shadow-sm bg-body rounded header_item">ログアウト</a>
                            </li>
                        @endif
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('register.email') }}"
                                class="nav-link px-5 ml-3 shadow-sm bg-body rounded header_item">新規登録</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login.email') }}"
                                class="nav-link px-5 ml-3 shadow-sm bg-body rounded header_item"></i>ログイン</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        @if (session('flush.message') && session('flush.alert_type'))
            <div class="text-center alert alert-{{ session('flush.alert_type') }}" role="alert">
                {{ session('flush.message') }}
            </div>
        @endif
    @show

    <div class="container">
        @yield('content')
    </div>

    @section('footer')
        <footer class="container px-3 py-4">
            <div class="d-flex flex-column">
                <div class="px-5 py-1 text-muted">
                    <ul class="pb-3 navbar-nav footer_nav">
                        <li class="nav-item px-2 ml-3">利用規約</li>
                        <li class="nav-item px-2 ml-3">個人情報の取り扱い</li>
                    </ul>
                </div>
                <div class="px-5 py-1 text-muted">
                    <ul class="navbar-nav footer_logo">
                        <li class="nav-item px-2 ml-3 logo-text">
                            運営会社Anovey
                        </li>
                        <li class="nav-item px-2 ml-3 small logo-text">Copyright(C)2019 Anovey,Allright Reserved.</li>
                    </ul>
                </div>
            </div>
        </footer>
    @show
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
