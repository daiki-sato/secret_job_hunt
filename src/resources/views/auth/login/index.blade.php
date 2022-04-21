@extends('layouts.app')

@section('content')
    <div class="auth_login w-50 mx-auto">
        <h2 class="auth_login_title text-center mb-3">ログイン</h2>
        <div>
            <div>
                <a href="{{ route('login.email') }}" class="d-block  mb-4 btn btn-danger">メールアドレスでログイン</a>
                <a href="" class="d-block  mb-4 btn btn-outline-dark">Goggleでログイン</a>
                <a href="" class="d-block  mb-4 btn btn-primary">Facebookでログイン</a>
                <a href="" class="d-block  mb-4 btn btn-success">LINEでログイン</a>
            </div>
        </div>
        <hr>
        <p class="text-center">アカウントをお持ちでない方</p>
        <a href="{{ route('register') }}" class="d-block btn btn-outline-danger">新規登録</a>
    </div>
@endsection
