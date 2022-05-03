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

        <form action="">
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
                  <form action="{{route('user_update',['id' => $user->id])}}" method="post">
                    @csrf
                    <table border="1">
                        <tbody>
                            <tr>
                                <td>姓</td>
                                <td>
                                  <input type="hidden" name="id" value="{{$user->id}}">
                                  <input type="text" name="first_name" id="" value="{{$user->first_name}}">
                                </td>
                            </tr>
                            <tr>
                                <td>名</td>
                                <td>
                                  <input type="hidden" name="id" value="{{$user->id}}">
                                  <input type="text" name="last_name" id="" value="{{$user->last_name}}">
                                </td>
                            </tr>
                            <tr>
                                <td>姓・カナ</td>
                                <td>
                                  <input type="hidden" name="id" value="{{$user->id}}">
                                  <input type="text" name="first_name_ruby" id="" value="{{$user->first_name_ruby}}">
                                </td>
                            </tr>
                            <tr>
                                <td>名・カナ</td>
                                <td>
                                  <input type="hidden" name="id" value="{{$user->id}}">
                                  <input type="text" name="last_name_ruby" id="" value="{{$user->last_name_ruby}}">
                                </td>
                            </tr>
                            <tr>
                                <td>ニックネーム</td>
                                <td>
                                  <input type="hidden" name="id" value="{{$user->id}}">
                                  <input type="text" name="nickname" id="" value="{{$user->nickname}}">
                                </td>
                            </tr>
                            <tr>
                                <td>性別</td>
                                <td>
                                  <input type="hidden" name="id" value="{{$user->id}}">
                                  <input type="radio" name="sex" id="male" value="{{$user->sex}}">
                                  <label for="male">男性</label>
                                  <input type="radio" name="sex" id="female" value="{{$user->sex}}">
                                  <label for="female">女性</label>
                                  <input type="radio" name="sex" id="none" value="{{$user->sex}}">
                                  <label for="none">選択しない</label>
                                </td>
                            </tr>
                            <tr>
                                <td>企業名</td>
                                <td>
                                  <input type="hidden" name="id" value="{{$user->id}}">
                                  <input type="text" name="company" id="" value="{{$user->company}}">
                                </td>
                            </tr>
                            <tr>
                                <td>部署名</td>
                                <td>
                                  <input type="hidden" name="id" value="{{$user->id}}">
                                  <input type="text" name="department" id="" value="{{$user->department}}">
                                </td>
                            </tr>
                            <tr>
                                <td>勤務年数</td>
                                <td>
                                  <input type="hidden" name="id" value="{{$user->id}}">
                                  <input type="text" name="working_period" id="" value="{{$user->working_period}}">年
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="送信">
                  </form>
                </div>
            </div>
            <button>情報を更新する</button>
        </form>

    </div>
@endsection
