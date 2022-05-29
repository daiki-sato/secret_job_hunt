@extends('layouts.app')

@section('content')
    <div class="pt-5 w-50 mx-auto auth_login">
        <h2 class="auth_login_title text-center">{{ __('Reset Password') }}</h2>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST" class="mt-4 mb-2 form-login">
            @csrf
            <div class="pt-2 pb-4 mb-2 text-left">
                <label for="inputEmail" class="input-area">{{ __('E-Mail Address') }}</label>
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
                <button type="submit" class="fw-bold text-light btn btn-lg btn-green btn-block">{{ __('Send Password Reset Link') }}</button>
            </div>        
        </form>
    </div>
@endsection
