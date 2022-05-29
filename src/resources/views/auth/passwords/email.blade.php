@extends('layouts.app')

@section('content')
    <div class="pt-5 w-50 mx-auto auth_login">
        <h2 class="auth_login_title text-center">パスワードの再設定</h2>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST" class="mt-4 mb-2 form-login">
            @csrf
            <div class="pt-2 pb-4 mb-2 text-left">
                <div class="pb-2">
                    <label for="inputEmail" class="h5 input-area">メールアドレス</label>
                    <span class="pl-3">ご登録いただいたメールアドレスをご入力ください</span>
                </div>
                <input id="email" placeholder="メールアドレス" type="email"
                class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mt-4 mb-2 px-2 text-center login-button">
                <button type="submit" class="fw-bold text-light btn btn-lg btn-green btn-block">再設定用のメールを送信する</button>
            </div>        
        </form>
    </div>
@endsection
