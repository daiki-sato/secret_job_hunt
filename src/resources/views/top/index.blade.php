@extends('layouts.app')

@section('content')
    <div class="top-index">
        <div class="first_view mx-auto shadow">
            <img src="{{ asset('img/fvimg.png') }}" class="first-view_img" alt="fv">
        </div>
        <a class="btn_register btn py-3 my-5 w-50 mx-auto shadow"
            href="{{ route('register') }}">新規会員登録<div class="letter-strong"><p class="m-0">無料</p></div></a>
        <div class="discription">
            <p class="sub-title">Anoveyとは？</p>
            <span class="title">希望転職先の人に匿名で話を聞けるサービス</span>
            <div class="d-flex flex-wrap">
                <div class="w-50">
                    <p class="h5 px-3 py-2 mx-auto my-3 w-50 before">従来の転職</p>
                    <p class="px-5 py-2 m-3">短い判断期間の中で、限られた情報しか得られず、<br>実際に入社しなければ会社の内情がわからない
                    </p>
                    <img src="{{ asset('img/before.png') }}" class="m-3" alt="従来の転職">
                </div>
                <div class="w-50">
                    <p class="h5 px-3 py-2 mx-auto my-3 w-50 after">Anovey</p>
                    <p class="px-5 py-2 m-3">実際に勤務している人の話を匿名で聞けるため、"本物"の情報が入ってくる
                    </p>
                    <img src="{{ asset('img/after.png') }}" class="m-3" alt="Anovey">
                </div>
            </div>
            <div class="px-3 py-5 pros">
                <p class="title">Anoveyのメリット</p>
                <div class="d-flex flex-wrap px-5 py-3 mx-5 pros-container">
                    <div class="w-50 d-flex flex-wrap">
                        <img src="{{ asset('img/price.png') }}" alt="price">
                        <div class="explanation">
                            <p class="h5">10分1200円<br>手の届きやすい価格</p>
                            <p class="m-0">手軽に・低価格で・安心の情報を直接聞くことができます</p>
                        </div>
                    </div>
                    <div class="w-50 d-flex flex-wrap">
                        <img src="{{ asset('img/anonymous.png') }}" alt="anonymous">
                        <div class="explanation">
                            <p class="h5">安心の匿名相談</p>
                            <p>転職時の、周りに言えない・言いづらい不安を解消</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="process">
                <p class="title">登録から相談までの流れ</p>
                <div class="row">
                    <div class="col">新規登録</div>
                    <div class="col">検索&日程調整</div>
                    <div class="col">相談</div>
                </div>
                <p>Anoveyでは多様な会社・部署の方からお話を聞くことができます</p>
            </div>
            <div class="example">
                <p class="title">登録者紹介</p>
                <div class="row">
                    <div class="col">〇〇会社・人事部</div>
                    <div class="col">〇〇会社・営業部</div>
                    <div class="col">〇〇会社・広報部</div>
                </div>
            </div>
        </div>
        {{-- タブ --}}
        {{-- <div class="tabs">
            <input id="consulter" type="radio" name="tab_item" checked>
            <label class="tab_item" for="consulter">相談したい▼</label>
            <input id="consultant" type="radio" name="tab_item">
            <label class="tab_item" for="consultant">相談に乗る▼</label>
            <div class="tab_content mx-auto center-block" id="consulter_content">
                <div class="about_current_job mb-5">
                    <h3 class="w-75 mx-auto text-center small mt-3 font-weight-bold">転職先について詳しく聞ける人はいますか？</h3>
                    <div class="underbar_brown"></div>
                    <div class="d-flex flex-wrap">
                        <div class="w-50 pl-5">
                            <img class="d-block w-25 mx-auto mt-4" src="{{ asset('/img/question1.png') }}" alt="">
                            <p class="w-50 font-weight-bold mx-auto">ネットの情報や、面接ではわからない会社の情報は多い</p>
                        </div>
                        <div class="w-50">
                            <img class="d-block w-50 mx-auto" src="{{ asset('/img/thought.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="about_step mt-5">
                    <h3 class="w-75 mx-auto text-center small mt-3 font-weight-bold">簡単な3ステップで自分の行きたい会社の人に話を聞ける</h3>
                    <div class="underbar_brown"></div>
                    <div class="d-flex flex-wrap">
                        <div class="step_detail mx-2 shadow">
                            <h4 class="font-weight-bold w-75 mx-auto my-5 text-center">見つける</h4>
                        </div>
                        <div class="step_detail mx-2 shadow">
                            <h4 class="font-weight-bold w-75 mx-auto my-5 text-center">日程を決める</h4>
                        </div>
                        <div class="step_detail mx-2 shadow">
                            <h4 class="font-weight-bold w-75 mx-auto my-5 text-center">実際に話を聞く</h4>
                        </div>
                    </div>
                </div>
                <div class="consulter_merit1 mt-5">
                    <div class="consulter_merit d-flex p-3 m-5 rounded shadow">
                        <h3 class="w-50 bg-white font-weight-bold rounded-pill text-center py-4 m-0">安心の低価格</h3>
                        <div class="align-middle w-50">
                            <p class="w-75 mx-auto">あなたの情報が守られているからこそ、本音で話せます。</p>
                        </div>
                    </div>
                    <div class="consulter_merit d-flex p-3 m-5 rounded shadow">
                        <div class="align-middle w-50">
                            <p class="w-75 mx-auto align-middle">お試し感覚で話せる時間設定に。話し足りなければ、延長も可能です。</p>
                        </div>
                        <h3 class="w-50 bg-white font-weight-bold rounded-pill text-center py-4 m-0">10分1000円という低価格</h3>
                    </div>
                </div>
            </div>
            <div class="tab_content center-block" id="consultant_content">
                <h3 class="w-75 mx-auto text-center lead mt-3 font-weight-bold">手順は簡単3step</h3>
                <div class="underbar_brown"></div>
            </div>
        </div> --}}
        {{-- タブおわ --}}
    @endsection
