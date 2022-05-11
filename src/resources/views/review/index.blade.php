@extends('layouts.app')

@section('content')
<h4>//絞り込み後画面（仮）です。正式なのは大暉がやってる？のかな？それとうまくがっちゃんこする感じだぜえ</h4>
    <div class="d-flex  flex-column col-6 mx-auto">
        @foreach($solvers as $solver)
            <a href="{{ route('review-show', $solver->id) }}" class="btn btn-primary mt-3">  {{ $solver->nickname }}</a>
        @endforeach
    </div>
@endsection
