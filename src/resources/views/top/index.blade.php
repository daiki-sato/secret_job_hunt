@extends('layouts.app')

@section('content')
    <div class="top-index">
        <div class="first_view mx-auto shadow">
            <img src="{{ asset('img/fvimg.png') }}" class="first-view_img" alt="fv">
        </div>
        <div class="top-main">
            <div class="px-5">
                <a class="btn_register btn py-3 my-5 w-50 mx-auto shadow" href="{{ route('register.email') }}">新規会員登録<div
                        class="letter-strong">
                        <p class="m-0">無料</p>
                    </div>
                </a>
            </div>
            <div class="px-5 mx-5 discription">
                <p class="sub-title">Anoveyとは？</p>
                <span class="title">希望転職先の人に匿名で話を聞けるサービス</span>
                <div class="px-5 d-flex flex-wrap">
                    <div class="w-50">
                        <p class="h5 px-3 py-2 mx-auto my-3 w-50 before">従来の転職</p>
                        <p class="px-5 py-2 m-3">短い判断期間の中で、限られた情報しか得られず、<br>実際に入社しなければ会社の内情がわからない
                        </p>
                        <img src="{{ asset('img/before.png') }}" class="mb-5" alt="従来の転職">
                    </div>
                    <div class="w-50">
                        <p class="h5 px-3 py-2 mx-auto my-3 w-50 after">Anovey</p>
                        <p class="px-5 py-2 m-3">実際に勤務している人の話を匿名で聞けるため、"本物"の情報が入ってくる
                        </p>
                        <img src="{{ asset('img/after.png') }}" class="mb-5" alt="Anovey">
                    </div>
                </div>
            </div>
            <div class="px-5 py-5 pros">
                <p class="title">Anoveyのメリット</p>
                <div class="d-flex flex-wrap py-3 mx-5 pros-container">
                    <div class="w-50 d-flex flex-wrap">
                        <img src="{{ asset('img/price.png') }}" class="pl-5 m-2" alt="price">
                        <div class="explanation_wrapper">
                            <div class="explanation">
                                <p class="h5">10分1200円<br>手の届きやすい価格</p>
                                <p class="m-0">手軽に・低価格で・安心の情報を直接聞くことができます</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-50 d-flex flex-wrap">
                        <p class="line"></p>
                        <img src="{{ asset('img/anonymous.png') }}" class="pl-5 m-2" alt="anonymous">
                        <div class="explanation_wrapper">
                            <div class="explanation">
                                <p class="h5">安心の匿名相談</p>
                                <p class="m-0">転職時の、周りに言えない・言いづらい不安を解消</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-5 py-5 flow">
                <p class="py-2 title">登録から相談までの流れ</p>
                <div class="px-5 mx-5 row">
                    <div class="px-3 py-3 mx-4 my-3 col step-box">
                        <div class="ml-5 box">
                            <p class="box_inner">1</p>
                        </div>
                        <img src="{{ asset('img/step1.png') }}" alt="step1">
                        <p class="step_title">新規登録</p>
                        <p class="px-3 m-0 step_detail">まずは必須項目を登録しましょう</p>
                    </div>
                    <div class="px-3 py-3 mx-4 my-3 col step-box">
                        <div class="ml-5 box">
                            <p class="box_inner">2</p>
                        </div>
                        <img src="{{ asset('img/step2.png') }}" alt="step2">
                        <p class="step_title">検索&日程調整</p>
                        <p class="px-3 m-0 step_detail">希望の企業・部署を検索し、日程調整を行います</p>
                    </div>
                    <div class="px-3 py-3 mx-4 my-3 col step-box">
                        <div class="ml-5 box">
                            <p class="box_inner">3</p>
                        </div>
                        <img src="{{ asset('img/step3.png') }}" class="pl-5" alt="step3">
                        <p class="step_title">相談</p>
                        <p class="px-3 m-0 step_detail">匿名で、希望の人に相談することができます</p>
                    </div>
                </div>
                <p class="pt-4 h4 step_detail">Anoveyでは多様な会社・部署の方からお話を聞くことができます</p>
            </div>
            <div class="p-5 example">
                <p class="py-2 title">登録者紹介</p>
                <div class="px-5 mx-5 my-3 row">
                    <div class="px-0 py-3 mx-5 col example-box">
                        <div class="example_inner">
                            <img src="{{ asset('img/person1.png') }}" alt="person1">
                            <p class="py-2 m-0">〇〇会社・人事部</p>
                        </div>
                    </div>
                    <div class="px-0 py-3 mx-5 col example-box">
                        <div class="example_inner">
                            <img src="{{ asset('img/person2.png') }}" alt="person2">
                            <p class="py-2 m-0">〇〇会社・人事部</p>
                        </div>
                    </div>
                    <div class="px-0 py-3 mx-5 col example-box">
                        <div class="example_inner">
                            <img src="{{ asset('img/person3.png') }}" alt="person3">
                            <p class="py-2 m-0">〇〇会社・人事部</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
