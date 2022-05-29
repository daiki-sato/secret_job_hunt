@extends('layouts.app')

@section('content')
    <!-- Button trigger modal -->

        <button type="button" class="mt-4 mb-2 px-2 btn btn-primary" data-toggle="modal" data-target="#evaluationModal">
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
                            <label class="evaluation_label" for="radio1">Good</label>
                            <input id="radio2" class="btn btn-outline-secondary evaluation" name="evaluation" type="radio"
                                value="0" />
                            <label class="evaluation_label" for="radio2">Bad</label>
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


    @if (Session::has('message'))
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script>
            $(window).load(function() {
                $('#modal_box').modal('show');
            });
        </script>

        <!-- モーダルウィンドウの中身 -->
        <div class="modal fade" id="modal_box" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <span class="py-2 h5">当サービスはいかがでしたか？<br>よろしければSNSシェアをお願いします</span>
                        <div class="d-flex justify-content-center sns-icons text-center">
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <!-- Twitter -->
                            <a href="//twitter.com/intent/tweet?url=http://localhost:80&text=" target="_blank"
                                rel="nofollow noopener noreferrer">
                                <img src="{{ asset('img/logo-twitter.webp') }}" class="p-3 sns-icon img-fluid"
                                    alt="twitter">
                            </a>

                            <!-- LINE -->
                            <a href="//timeline.line.me/social-plugin/share?url=http://localhost:80L&text=" target="_blank"
                                rel="nofollow noopener noreferrer">
                                <img src="{{ asset('img/logo-line.webp') }}" class="p-3 sns-icon img-fluid" alt="line">
                            </a>
                            <script>
                                let url = location.href
                                let snsLinks = $(".js-sns-link")
                                for (let i = 0; i < snsLinks.length; i++) {
                                    let href = snsLinks.eq(i).attr('href');
                                    //シェアページのURL上書き
                                    href = href.replace("url=", "url=" + url) //twitter,LINE,はてなブログ
                                    snsLinks.eq(i).attr('href', href);
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
