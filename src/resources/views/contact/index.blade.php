@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <form class="w-50" action="{{ route('contact_add') }}" method="POST">
            @csrf
            <h3 class="mt-3 mb-3">お問い合わせ</h3>
            <div class="main text-left">
                <div class="mb-3">
                    <label class="mb-0">お問合せ種別</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="contact_type" id="cashback" value="返金について" checked>
                        <label class="form-check-label" for="cashback">返金について</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="contact_type" id="others" value="その他">
                        <label class="form-check-label" for="others">その他</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">お問合せ内容</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">送信する</button>
        </form>
    </div>
@endsection
