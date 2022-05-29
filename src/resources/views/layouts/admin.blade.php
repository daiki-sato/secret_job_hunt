<html>

<head>
    <link href={{ asset('/img/logo.png') }} rel="shortcut icon" >
    <meta http-equiv="content-type" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Anovey</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/index.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('scripts')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>
    @section('header')
        <nav class="navbar sticky-top navbar-expand-sm navbar-green shadow-sm bg-body">
            <a class="navbar-brand" href="{{ route('admin') }}">
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
                            <a href="{{ route('logout') }}" class="nav-link px-5 ml-3 shadow-sm bg-body rounded">ログアウト</a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('register.email') }}" class="nav-link px-5 ml-3 shadow-sm bg-body rounded">新規登録</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login.top') }}"
                                class="nav-link px-5 ml-3 shadow-sm bg-body rounded"></i>ログイン</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    @show

    <div class="container">
        @yield('content')
    </div>

    @section('footer')
        <footer class="container px-3 py-4">
        </footer>
    @show
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
