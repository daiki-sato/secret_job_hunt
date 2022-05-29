@extends('layouts.app')

@section('content')
    <div class="pt-5 w-50 mx-auto email_register">
        <h2 class="email_register_title">会員登録</h2>
        <form method="POST" action="{{ route('register.email') }}" class="mt-4 mb-2">
            @csrf
            <div class="form-row">
                <div class="py-2 mb-2 text-left form-group col-12">
                    <label for="inputEmail" class="input-area">メールアドレス</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                        name="email" value="{{ old('email') }}" placeholder="例）aya.yamada@example.com" required>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="py-2 mb-2 text-left form-group col-12">
                    <label for="inputEmailConfirmation" class="input-area">メールアドレス確認</label>
                    <input type="email" class="form-control @error('email_confirmation') is-invalid @enderror"
                        id="inputemailConfirmation" name="email_confirmation" class="form-control" value="{{ old('email_confirmation') }}"
                        placeholder="例）aya.yamada@example.com" required>
                    @error('email_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="py-2 mb-2 text-left form-group col-12">
                    <label for="inputPassword" class="input-area">パスワード</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                        name="password" class="form-control" required>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="py-2 mb-2 text-left form-group col-12">
                    <label for="inputPasswordConfirmation" class="input-area">パスワード確認</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="inputPasswordConfirmation" name="password_confirmation" class="form-control" required>
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mt-4 mb-2 px-2 text-center login-button">
                <button type="submit" class="fw-bold text-light btn btn-lg btn-green btn-block email_register_next_button">次へ</button>
            </div>
        </form>
    </div>
@endsection
