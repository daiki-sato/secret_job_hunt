@extends('layouts.app')

@section('content')
    <div class="d-flex  flex-column col-6 mx-auto">
        @foreach($solvers as $solver)
            <a href="{{ route('review-show', $solver->id) }}" class="btn btn-primary mt-3">  {{ $solver->nickname }}</a>
        @endforeach
    </div>
@endsection
