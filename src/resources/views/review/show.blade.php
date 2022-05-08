@extends('layouts.app')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

@section('content')
    <div class="content d-flex justify-content-center w-100 ">
        <div class="profile d-flex justify-content-center mt-5 w-5 mr-5">
            <div class="img">
                <img src="{{ asset('img/review/reviewer.png') }}" alt="プロフィール写真">
            </div>
            <div class="comment text-start">
                <p class="name mb-0">藤森日奈</p>
                <p class="belongs">リクルート/営業</p>
            </div>
        </div>
        <div class="review-list mt-5 text-start">
            <h4>評価一覧</h4>
            <div class="content d-flex ">
                <ul class="nav nav-pills mb-3 content " id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link bg-light active mr-5 text-danger" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">
                            Good
                            <p class="border-dark border-bottom text-dark">12</p>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link bg-light text-primary" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">
                            Bad
                            <p class="border-dark border-bottom text-dark">0</p>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="tab-content w-auto" id="pills-tabContent ">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="reviewer  d-flex justify-content-center mt-3">
                        <div class="img">
                            <img src="{{ asset('img/review/reviewer.png') }}" alt="プロフィール写真">
                        </div>
                        <div class="comment div flex-column text-md-start">
                            <p class="name mb-1">迷える子羊</p>
                            <p class="review text-wrap">知識がなかったので助かりました。機会があればまたよろしくお願いいたします！</p>
                            <p>2022/05/05</p>
                        </div>
                    </div>
                    <div class="reviewer d-flex justify-content-center mt-3">
                        <div class="img">
                            <img src="{{ asset('img/review/reviewer.png') }}" alt="プロフィール写真">
                        </div>
                        <div class="comment div flex-column text-md-start">
                            <p class="name mb-0">迷える子羊</p>
                            <p class="review w-auto">知識がなかったので助かりました。機会があればまたよろしくお願いいたします！</p>
                            <p>2022/05/05</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="reviewer d-flex justify-content-center mt-3">
                        <div class="img">
                            <img src="{{ asset('img/review/reviewer.png') }}" alt="プロフィール写真">
                        </div>
                        <div class="comment div flex-column text-start ">
                            <p class="name ">迷える狼</p>
                            <p class="review">boooooo</p>
                            <p>2022/05/05</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/styleindex.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection