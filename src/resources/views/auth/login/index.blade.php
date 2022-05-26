@extends('layouts.app')

@section('content')
    <div class="p-5 auth_login w-50 mx-auto">
        <h2 class="auth_login_title text-center mb-3">ログイン</h2>
        <div>
            <div class="m-4">
                <div class="d-flex justify-content-center align-items-center py-2 mb-4 button-mail">
                    <i class="mr-3 fa-solid fa-envelope"></i><a href="{{ route('login.email') }}" class="d-block text-light">メールアドレスでログイン</a>
                </div>
            </div>
        </div>
        <hr>
        <p class="text-center">アカウントをお持ちでない方</p>
        <a href="{{ route('register.email') }}" class="d-block py-2 m-4 btn btn-outline-danger button-register">新規登録</a>
    </div>
@endsection
