@extends('layouts.app')

@section('content')
    <div class="content d-flex justify-content-center w-100 ">
        <div class="profile d-flex justify-content-center mt-5 w-5 mr-5">
            <div class="img">
                <img src="{{ asset('img/review/reviewer.png') }}" alt="プロフィール写真">
            </div>
            <div class="comment text-left">
                <p class="name mb-0">{{ $solver->nickname }}</p>
                <p class="belongs">{{ $solver->company }}/{{ $solver->department }}</p>
            </div>
        </div>
        <div class="review-list mt-5 text-start">
            <h4 class="text-left">評価一覧</h4>
            <div class="content d-flex ">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-danger bg-white mr-5" id="pills-home-tab" data-toggle="pill"
                            href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            Good
                            <p class="border-dark border-bottom text-dark">{{ $good_users->count('evaluation') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary bg-white" id="pills-profile-tab" data-toggle="pill"
                            href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Bad
                            <p class="border-dark border-bottom text-dark">{{ $bad_users->count('evaluation') }}</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content w-auto " id="pills-tabContent ">
                <div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @foreach ($good_users as $good_user)
                        <div class="reviewer  d-flex  justify-content-left mt-3">
                            <div class="img">
                                <img src="{{ asset('img/review/reviewer.png') }}" alt="プロフィール写真">
                            </div>
                            <div class="comment text-md-start">
                                <p class="name mb-1">{{ $good_user->nickname }}</p>
                                <p class="review text-wrap">{{ $good_user->evaluation_comment }}</p>
                                <p>{{ $good_user->call_end_time }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @foreach ($bad_users as $bad_user)
                        <div class="reviewer d-flex justify-content-left mt-3">
                            <div class="img">
                                <img src="{{ asset('img/review/reviewer.png') }}" alt="プロフィール写真">
                            </div>
                            <div class="comment div flex-column text-left ">
                                <p class="name mb-1">{{ $bad_user->nickname }}</p>
                                <p class="review text-wrap">{{ $bad_user->evaluation_comment }}</p>
                                <p>{{ $bad_user->call_end_time }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('review') }}" type="button" class="btn btn-primary mt-5" act>戻る</a>
@endsection
