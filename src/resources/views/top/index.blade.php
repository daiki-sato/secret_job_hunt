@extends('layouts.app')

@section('content')
    <div class="top-index mx-5">
        {{-- <div class="d-flex">
            <p>相談したい方</p>
            <p>相談乗りたい方</p>
        </div> --}}
        <div class="first_view mx-auto shadow">
        </div>
        <a class="d-block btn_register btn py-3 my-4 w-50 mx-auto font-weight-bold shadow"
            href="{{ route('register') }}">無料会員登録</a>
        {{-- タブ --}}
        <div class="tabs">
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
        </div>
        {{-- タブおわ --}}
    @endsection
