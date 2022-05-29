@extends('layouts.app')

@section('content')
    <div class="p-5 mypage-index">
        <div class="p-3 mypage-container">
            <div class="pl-4 mx-5 text-left profile_container">
                <form action="{{ route('user_update', ['id' => $user->id]) }}" method="post">
                    @csrf
                    <p class="py-3 h3 info_title">登録情報編集</p>
                    <div class="pl-4 py-4 text-center profile_detail">
                        <table class="mb-5 profile_table">
                            <tbody>
                                <tr>
                                    <td>姓</td>
                                    <td>
                                        <input type="text" name="first_name" value="{{ $user->first_name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>名</td>
                                    <td>
                                        <input type="text" name="last_name" value="{{ $user->last_name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>姓・カナ</td>
                                    <td>
                                        <input type="text" name="first_name_ruby" value="{{ $user->first_name_ruby }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>名・カナ</td>
                                    <td>
                                        <input type="text" name="last_name_ruby" value="{{ $user->last_name_ruby }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>ニックネーム</td>
                                    <td>
                                        <input type="text" name="nickname" value="{{ $user->nickname }}">
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>電話番号</td>
                                    <td>
                                        <input type="text" name="phone_number" placeholder="000-000-000" value="{{ $user->phone_number }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>性別</td>
                                    <td>
                                        <input type="radio" name="sex" id="male" value="男"
                                            @if ($user->sex == '男') checked @endif>
                                        <label for="male">男性</label>
                                        <input type="radio" name="sex" id="female" value="女"
                                            @if ($user->sex == '女') checked @endif>
                                        <label for="female">女性</label>
                                        <input type="radio" name="sex" id="none" value="未選択"
                                            @if ($user->sex == '未選択') checked @endif>
                                        <label for="none">選択しない</label>
                                    </td>
                                </tr>
                                @if ($user->role_id == 3)
                                    <tr>
                                        <td>企業名</td>
                                        <td>
                                            <input type="text" name="company" value="{{ $user->company }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>部署名</td>
                                        <td>
                                            <input type="text" name="department" value="{{ $user->department }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>勤務年数</td>
                                        <td>
                                            <input type="text" name="working_period" value="{{ $user->working_period }}">年
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
            </div>
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type="submit" value="送信" class="px-5 py-2 mb-5 submit-button">
            </form>
            <a href="{{ route('my-page') }}" class="px-5 py-2 mb-5 submit-button">戻る</a>
        </div>
    </div>
@endsection
