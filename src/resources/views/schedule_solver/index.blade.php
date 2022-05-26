@extends('layouts.app')

@section('content')
    <div class="nav d-flex align-items-center justify-content-center mb-4 mt-4">
        <p>面談予約一覧</p>
    </div>

    <div>
        <div id="contents1" class="tab-pane active">
            <table class="table table-striped">
                <tbody>
                    @foreach ($confirmed_interviews as $confirmed_interview)
                        <tr>
                            <th scope="row"></th>
                            <td><img src="{{ asset('img/review/reviewer.png') }}" alt="プロフィール写真"></td>
                            <td>{{ $confirmed_interview->nickname }}</td>
                            <td>{{ $confirmed_interview->confirmed_interview_date }}</td>
                            <td><a href="">チャット画面へ</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
