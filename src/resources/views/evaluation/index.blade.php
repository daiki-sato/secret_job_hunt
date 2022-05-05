@extends('layouts.app')

@section('content')


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#evaluationModal">
        通話を終了する
    </button>

    <!-- Modal -->
    <div class="modal fade" id="evaluationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
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
                                value="2" />
                            <label for="radio2">Bad</label>
                        </div>
                        <div class="text">
                            <p class="mt-2 mb-0">ひとことでよいので理由を教えてください。</p>
                            <input type="text" class="form-control col-xs-4" placeholder="〇〇が良かった,悪かった,困ったなど..." name="evaluation_comment">
                        </div>
                        <input type="submit" class="btn btn-primary mt-4" value="フィードバックを送信する">
                    </form>
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
