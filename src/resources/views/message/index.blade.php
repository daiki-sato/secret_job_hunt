@extends('layouts.app')

@section('content')
{{-- // TODO:修正してください。 --}}
    <div class="message-index">
        <div id="message" class="message">
            <h2>メッセージ画面</h2>
            <div class="wrapper">
                <form action="{{ route('message.store') }}" method="post">
                    <div class="message_area">
                        <div class="date_area">
                            <p class="message_date">2022/11/11 14:11</p>
                        </div>
                        <div class="message_box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, ipsam.</p>
                        </div>
                    </div>
                    <textarea id="messageTextarea" class="textarea" name="message" cols="30" rows="10"></textarea>
                    <button>送信</button>
                </form>
            </div>
        </div>
    </div>


    <style>
        .textarea {
            padding: 12px;
            font-size: 12px;
            line-height: 18px;
            width: 100%;
            height: 120px;
            border-color: #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

    </style>
@endsection
