@extends('layouts.app')

@section('content')
    {{-- // TODO:修正してください。 --}}
    <div class="p-5 mypage-index">
        <div class="pt-5 pb-3 mypage-container">
            <div class="m-3 mypage-container_top">
                <h2 class="mypage-title">マイページ</h2>
                <p class="mr-5 contact-title">お問い合せ</p>
            </div>
            <div class="text-center profile_top">
                <img src="" alt="profile_img" class="m-3 profile_img">
                <p class="m-2 h3">{{ $user->nickname }}</p>
            </div>
            <div class="pl-4 mx-5 text-left ticket_container">
                <p class="py-3 h3 info_title">所持チケット</p>
                <div class="pt-2 pb-4 ticket_detail">
                    <p class="pl-5 m-0 h4 ticket_number">6枚</p>
                    <button class="px-5 mx-4 py-2 exchange-button">換金する</button>
                </div>
            </div>
            <div class="pl-4 mx-5 text-left profile_container">
                <p class="py-3 h3 info_title">登録者情報</p>
                <div class="pl-4 py-4 text-center profile_detail">
                    <table class="mb-5 profile_table">
                        <tbody>
                            <tr>
                                <td>名前</td>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <td>カナ</td>
                                <td>{{ $user->first_name_ruby }} {{ $user->last_name_ruby }}</td>
                            </tr>
                            <tr>
                                <td>メールアドレス</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>ステータス</td>
                                <td>{{ $user->role_id }}</td>
                            </tr>
                            <tr>
                                <td>性別</td>
                                <td>{{ $user->sex }}</td>
                            </tr>
                            <tr>
                                <td>勤務先</td>
                                <td>{{ $user->company }}</td>
                            </tr>
                            <tr>
                                <td>部署</td>
                                <td>{{ $user->department }}</td>
                            </tr>
                            <tr>
                                <td>勤務年数</td>
                                <td>{{ $user->working_period }}年</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('user_edit', ['id' => $user->id]) }}" class="px-5 py-2 edit-button">情報を更新する</a>
                </div>
            </div>
            <p class="px-5 py-2 account-button"><a href="" class="text-danger">アカウント削除</a></p>
            <p class="px-5 py-2 account-button"><a href="" class="text-dark"><i class="fa-solid fa-right-from-bracket"></i>ログアウト</a></p>
        </div>
    </div>
@endsection
