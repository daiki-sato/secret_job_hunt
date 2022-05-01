@extends('layouts.app')

@section('content')
    <div class="auth_login">
        <h2 class="auth_login_title text-center">ログイン</h2>
        @foreach ($errors->all() as $error)
            <p class="text-danger text-center m-0">{{ $error }}</p>
        @endforeach
        <form action="{{ route('login.post') }}" method="POST" class="form-login">
            @csrf
            <div class="mb-3">
                <label for="inputEmail" class="">メールアドレス</label>
                <input type="email" id="inputEmail" name="email" class="form-control" value="{{ old('email') }}"
                    placeholder="メールアドレス" required autofocus>
            </div>
            <div>
                <label for="inputPassword" class="">パスワード</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="パスワード"
                    required>
            </div>
            <div class="form-check my-1">
                <input type="checkbox" class="form-check-input" id="rememberToken" name="remember">
                <label class="form-check-label" for="rememberToken">ログイン状態を保存する</label>
            </div>
            <button type="submit" class="btn btn-lg btn-green btn-block">ログイン</button>
            <a class="d-block text-green" href="{{ route('register') }}">新規登録の方はこちら</a>
            @if (Route::has('password.request'))
                <div class="text-center text-xs text-gray-400 mt-6">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れた方はこちら') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
@endsection
