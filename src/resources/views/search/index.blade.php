@extends('layouts.app')

@section('content')
    @php
    $userId = Auth::user()->id;
    @endphp
    <div id="search" data-user-id="{{ $userId }}"></div>
@endsection
