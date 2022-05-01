@extends('layouts.app')

@section('content')
    {{-- // TODO:修正してください。 --}}
    <div class="mypage-index">
        <div class="mypage-container">
            <div class="mypage-container_top">
                <h2>マイページ</h2>
                <p>お問合せ</p>
            </div>
        </div>

        <form action="" method="post">
            <div class="text-center profile_top">
                <img src="" alt="profile_img">
                <p>mrp</p>
            </div>
            <div class="ticket_container">
                <p class="ticket_title">所持チケット</p>
                <div class="ticket_detail">
                    <p>6枚</p>
                    <button>換金する</button>
                </div>
            </div>
            <div class="profile_container">
                <div class="profile_title">
                    <p>登録者情報</p>

                </div>
                <div class="profile_detail">
                    <table border="1">
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
                </div>
            </div>
            <a href="{{route('user_edit', ['id' => $user->id])}}">情報を更新する</a>
        </form>

    </div>
@endsection
