@extends('layouts.app')

@section('content')
    <div class="auth_register">
        <h2 class="auth_register_title">会員登録</h2>
        <div>
            <div>
                <a href="{{ route('register.email') }}" class="d-block  mb-4 btn btn-danger">メールアドレスで登録する</a>
                <a href="" class="d-block  mb-4 btn btn-outline-dark">Goggleで登録する</a>
                <a href="" class="d-block  mb-4 btn btn-primary">Facebookで登録する</a>
                <a href="" class="d-block  mb-4 btn btn-success">LINEで登録する</a>
            </div>
            <p>登録またはログインすることで利用規約とプライバシーポリシーに同意したものとみなされます</p>
        </div>
        <hr>
        <p>アカウントをお持ちの方</p>
        <a href="{{ route('login.email') }}" class="d-block btn btn-outline-danger">ログイン</a>
    </div>
@endsection
