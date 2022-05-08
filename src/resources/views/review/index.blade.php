@extends('layouts.app')

@section('content')
    <div class="d-flex  flex-column col-6 mx-auto">
        <a href="{{ route('review-show', ['id' => 9]) }}" class="btn btn-primary mb-1 ">藤森日奈　女性　3年目</a>
        <a href="{{ route('review-show', ['id' => 2]) }}" class="btn btn-primary">徳川家康　男性　1年目</a>
    </div>
@endsection
