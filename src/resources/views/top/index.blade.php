@extends('layouts.app')

@section('content')
    <div class="top-index">
        <p>相談したい方</p>
        <p>相談乗りたい方</p>
        <h2>次のステージは生の声から決めよう</h2>
        <a class="d-block btn btn-primary" href="{{ route('register') }}">無料会員登録</a>
    </div>
@endsection
