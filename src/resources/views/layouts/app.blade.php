<html>

<head>
    <meta http-equiv="content-type" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Anovey</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('scripts')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/evaluation/index.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>
    @section('header')
        <nav class="navbar sticky-top navbar-expand-sm navbar-green shadow-sm bg-body rounded">
            <a class="navbar-brand" href="{{ route('search') }}">
                <img src="{{ asset('img/logo.png') }}" alt="logo">
                Anovey<span class="sub-title">匿名転職相談サービス</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4"
                aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="material-icons icon-white">dehaze</i></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav4">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('reservation-list') }}" class="nav-link shadow-sm bg-body rounded"><i
                                    class="material-icons md-light cartColor">receipt</i>予約一覧</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('thread') }}" class="nav-link">スレッドへ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('search') }}" class="nav-link"><i
                                    class="material-icons md-light cartColor">shopping_cart</i>検索画面へ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('my-page') }}" class="nav-link shadow-sm bg-body rounded"><i
                                    class="material-icons md-light cartColor">shopping_cart</i>マイページへ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link shadow-sm bg-body rounded"><i
                                    class="material-icons md-light cartColor">exit_to_app</i>ログアウト</a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link shadow-sm bg-body rounded">新規登録</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login.top') }}" class="nav-link"><i
                                    class="material-icons md-light cartColor">input</i>ログイン</a>
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
                        <li class="nav-item">よくある質問</li>
                        <li class="nav-item">利用規約</li>
                        <li class="nav-item">個人情報の取り扱い</li>
                    </ul>
                </div>
                <div class="px-5 py-1 text-muted">
                    <ul class="navbar-nav footer_logo">
                        <li class="nav-item logo-text">
                            運営会社Anovey
                        </li>
                        <li class="nav-item small logo-text">Copyright(C)2019 Anovey,Allright Reserved.</li>
                    </ul>
                </div>
            </div>
        </footer>
    @show
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/styleindex.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
