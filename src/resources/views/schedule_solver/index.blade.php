@extends('layouts.app')

@section('content')
    <ul class="nav d-flex align-items-center justify-content-center mb-4 mt-4">
        <li class="nav-item">
            <a href="#contents1" class="nav-link active mr-3" data-toggle="tab">面談予約一覧</a>
        </li>
        <li class="nav-item">
            <a href="#contents2" class="nav-link" data-toggle="tab">未回答の依頼一覧</a>
        </li>
    </ul>

    <div class="tab-content w-50 mx-auto">
        <div id="contents1" class="tab-pane active">
            <table class="table table-striped">
                <tbody>
                    @foreach ($confirmed_interviews as $confirmed_interview )
                        <tr>
                            <th scope="row"></th>
                            <td><img src="{{ asset('img/review/reviewer.png') }}" alt="プロフィール写真"></td>
                            <td>{{$confirmed_interview->nickname}}</td>
                            <td>{{ $confirmed_interview->confirmed_interview_date }}</td>
                            <td><a href="">チャット画面へ</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div id="contents2" class="tab-pane">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td><img src="{{ asset('img/review/reviewer.png') }}" alt="プロフィール写真"></td>
                        <td>はよ回答</td>
                        <td>2022/05/18 14:00-14:10</td>
                        <td><a href="">チャット画面へ</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
