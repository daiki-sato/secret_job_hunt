@extends('layouts.app')

@section('content')
    <div class="d-flex  flex-column col-6 mx-auto">
        <a href="{{ route('review-show', ['id' => 2]) }}" class="btn btn-primary">user_id = 2</a>
        <a href="{{ route('review-show', ['id' => 9]) }}" class="btn btn-primary mb-1 ">user_id = 9</a>
    </div>
@endsection
