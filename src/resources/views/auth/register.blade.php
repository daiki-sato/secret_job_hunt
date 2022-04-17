@extends('layouts.app')

@section('content')
    <div class="email_register">
        <form action="{{ route('register.post') }}" method="POST" class="max-width-800-center">
            @csrf
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputEmail">メールアドレス</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                        name="email" value="{{ old('email') }}" placeholder="例）aya.yamada@example.com" required>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputEmailConfirmation">メールアドレス確認</label>
                    <input type="email" class="form-control @error('email_confirmation') is-invalid @enderror"
                        id="inputemailConfirmation" name="email_confirmation" value="{{ old('email_confirmation') }}" placeholder="例）aya.yamada@example.com" required>
                    @error('email_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputPassword">パスワード</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                        name="password" required>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputPasswordConfirmation">パスワード確認</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="inputPasswordConfirmation" name="password_confirmation" required>
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="email_register_next_button">次へ</button>
        </form>
    </div>
@endsection
