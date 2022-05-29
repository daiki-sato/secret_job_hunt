@extends('layouts.app')

@section('content')
    <div class="pt-5 w-50 mx-auto auth_login">
        <h2 class="auth_login_title text-center">面談予約一覧</h2>
    
        <div class="mt-4 mb-2">
            <div id="contents1" class="tab-pane active">
                <table class="table table-striped">
                    <tbody>
                        @foreach ($confirmed_interviews as $confirmed_interview)
                            <tr>
                                <th scope="row schedule_table"></th>
                                <td class="text-center"><img src="{{ asset('img/review/reviewer.png') }}" alt="プロフィール写真"></td>
                                <td class="text-center">{{ $confirmed_interview->nickname }}</td>
                                <td class="text-center">{{ $confirmed_interview->confirmed_interview_date->format('Y-m-d H:i') }}</td>
                                <td class="text-center"><a href="">チャット画面へ</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
