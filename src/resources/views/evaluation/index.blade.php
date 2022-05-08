@extends('layouts.app')

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#evaluationModal">
        通話を終了する
    </button>

    <!-- Modal -->
    <div class="modal fade" id="evaluationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>お疲れ様でした面談はどうでしたか？</h4>
                    <p class="text-black-50">＊評価をもって面談完了となります。</p>
                    <form action="{{ route('evaluation_add') }}" method="POST">
                        @csrf
                        <div class="radiobox">
                            <input id="radio1" class=" btn btn-outline-secondary mr-4 evaluation" name="evaluation"
                                type="radio" value="1" />
                            <label for="radio1">Good</label>
                            <input id="radio2" class="btn btn-outline-secondary evaluation" name="evaluation" type="radio"
                                value="0" />
                            <label for="radio2">Bad</label>
                        </div>
                        <div class="text">
                            <p class="mt-2 mb-0">ひとことでよいので理由を教えてください。</p>
                            <input type="text" class="form-control col-xs-4" placeholder="〇〇が良かった,悪かった,困ったなど..."
                                name="evaluation_comment">
                        </div>
                        <input type="submit" class="btn btn-primary mt-4" value="フィードバックを送信する">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
