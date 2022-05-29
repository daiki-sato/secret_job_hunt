@extends('layouts.app')

@section('content')
    {{-- TODO:後でチャット画面に移植する --}}
    <form action="{{ route('consent_add') }}" method="POST">
        @csrf
        <input type="radio" name="consent_type" value=1>承諾</button>
        <input type="radio" name="consent_type" value=0>否認</button>
        <button type="submit" class="btn btn-primary">送信する</button>
    </form>
@endsection
