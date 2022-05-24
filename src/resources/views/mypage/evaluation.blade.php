@extends('layouts.app')

@section('content')
    <div class="p-5 mypage-index">
        <div class="p-3 mypage-container">
あああ
            @foreach ($user->calls as $call)
            <p>{{ $call->evaluation_comment }}</p>
            @endforeach     
        </div>
    </div>
@endsection
