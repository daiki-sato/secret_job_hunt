@extends('layouts.app')

@section('content')
    @php
        $userId = Auth::user()->id;
        $roleId = Auth::user()->role_id;
    @endphp
    <div id="thread" data-user-id="{{ $userId }}" data-role-id="{{ $roleId }}"></div>
@endsection
