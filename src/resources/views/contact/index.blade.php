@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <form class="w-50">
            <h3 class="mt-3 mb-3">お問い合わせ</h3>
            <div class="main text-left">
                <div class="mb-3 text-left">
                    <label class="form-label">お名前</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">お名前（カナ）</label>
                    <input type="text" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">メールアドレス</label>
                    <input type="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="mb-0">ステータス</label>
                    <br>
                    <div class="form-check form-check-inline ">
                        <input class="form-check-input" type="radio" name="status" id="interviewer" checked>
                        <label class="form-check-label" for="interviewer">
                          相談する側
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="interviewee">
                        <label class="form-check-label" for="interviewee">
                          相談される側
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="mb-0">お問合せ項目</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="contents" id="cashback" checked>
                        <label class="form-check-label" for="cashback">返金について</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="contents" id="others">
                        <label class="form-check-label" for="others">その他</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">お問合せ内容</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">送信する</button>
        </form>




    </div>
@endsection
