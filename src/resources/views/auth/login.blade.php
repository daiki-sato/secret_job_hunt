@extends('layouts.app')

@section('content')
    <div class="pt-5 w-50 mx-auto auth_login">
        <h2 class="auth_login_title text-center">ログイン</h2>
        @foreach ($errors->all() as $error)
            <p class="text-danger text-center m-0">{{ $error }}</p>
        @endforeach
        <form action="{{ route('login.post') }}" method="POST" class="mt-4 mb-2 form-login">
            @csrf
            <div class="py-2 mb-2 text-left">
                <label for="inputEmail" class="input-area">メールアドレス</label>
                <input type="email" id="inputEmail" name="email" class="form-control" value="{{ old('email') }}"
                    placeholder="メールアドレス" required autofocus>
            </div>
            <div class="py-2 mb-2 text-left">
                <label for="inputPassword" class="input-area">パスワード</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="パスワード"
                    required>
            </div>
            <div class="form-check m-1 text-left">
                <input type="checkbox" class="form-check-input" id="rememberToken" name="remember">
                <label class="login-save form-check-label" for="rememberToken">ログイン状態を保存する</label>
            </div>
            <div class="mt-4 mb-2 px-2 text-center login-button">
                <button type="submit" class="fw-bold text-light btn btn-lg btn-green btn-block">ログイン</button>
            </div>
            @if (Route::has('password.request'))
            <div class="py-2 text-center text-xs text-gray-400 mt-6">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('パスワードを忘れた方はこちら') }}
                </a>
            </div>
            @endif
        </form>
    </div>
    <div class="py-3 text-center register-area">
        <p class="pt-3 m-0">アカウントをお持ちでない方</p>
        <div class="mx-auto my-4 px-2 text-center register-button">
            <a class="fw-bold btn btn-lg btn-green btn-block text-green register-button_text" href="{{ route('register.email') }}">新規会員登録</a>
        </div>
    </div>
@endsection
