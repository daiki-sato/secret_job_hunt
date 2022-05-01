@extends('layouts.app')

@section('content')
    <div class="reservation-list-index">
        <h2>予約一覧</h2>
        <p class="text-right">面談日</p>
        <div>
            <ul>
                <li class="border border-primary mb-3">
                    <a href="{{ route('thread')}}">
                        <p>mrp</p>
                        <p>株式会社アンチパターン</p>
                        <p class="text-right">2022/11/11 14:11</p>
                    </a>
                </li>
                <li class="border border-primary mb-3">
                    <p>だいき</p>
                    <p>株式会社アンチパターン</p>
                    <p class="text-right">2022/11/11 14:11</p>
                </li>
                <li class="border border-primary mb-3">
                    <p>まゆな</p>
                    <p>株式会社アンチパターン</p>
                    <p class="text-right">2022/11/11 14:11</p>
                </li>
                <li class="border border-primary mb-3">
                    <p>ひな</p>
                    <p>株式会社アンチパターン</p>
                    <p class="text-right">2022/11/11 14:11</p>
                </li>
            </ul>
        </div>
        <button>今の依頼を取り消す</button>
    </div>
@endsection
