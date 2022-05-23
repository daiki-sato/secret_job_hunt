@extends('layouts.app')

@section('content')
    <div class="px-5 py-3 mypage-index">
        <div class="p-3 mypage-container">
            <div class="m-3 mypage-container_top">
                <h2 class="mypage-title">マイページ</h2>
                <p class="mr-5 contact-title">お問い合せ</p>
            </div>
            <div class="py-4 m-2 d-flex mypage-wrapper">
                <div class="mx-5 text-center profile_top">
                    <img src="" alt="profile_img" class="profile_img">
                </div>
                <div class="px-5 mx-5 mypage-right">
                    <p class="h3 text-left">{{ $user->nickname }}</p>
                    <div class="text-left mypage_evaluation">
                        <div class="my-4 d-flex justify-content-left align-items-end evaluation">
                            <i class="px-1 fa-regular fa-thumbs-up fa-4x"></i>
                            <span class="mr-3 px-2 h2">{{ $user->calls->where('evaluation', true)->count('evaluation') }}</span>
                        {{-- </div>
                        <div class="evaluation"> --}}
                            <i class="px-1 pb-2 fa-regular fa-thumbs-down fa-2x"></i>
                            <span class="m-0 px-2 pb-2 h3">{{ $user->calls->where('evaluation', false)->count('evaluation') }}</span>
                        </div>
                        <a href="{{ route('evaluation-comment') }}" class="h5 evaluation-comment" >コメントを表示</a>
                    </div>
                    <div class="py-4 my-5 mypage-detail">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="wallet-tab" data-toggle="tab" href="#wallet" role="tab"
                                    aria-controls="wallet" aria-selected="true">獲得金額</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">登録情報</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="wallet" role="tabpanel" aria-labelledby="wallet-tab">
                                <div class="p-5 ticket_detail">
                                    <p class="pl-5 m-0 h4 ticket_number">{{ $balance / 1200 }}枚</p>
                                    <button class="px-5 mx-4 py-2 exchange-button btn btn-danger" type="button"
                                        data-toggle="modal" data-target="#exampleModalCenter">
                                        チケットの購入
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">購入枚数の選択</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('paypay') }}" method="GET" class="flex">
                                                    <img class="img-fluid h-50 w-50 "
                                                        src="{{ asset('img/paypay_1.jpg') }}" alt="">
                                                    <div class="ticketbypaypay pt-4 pl-4">
                                                        <p>1枚1200円</p>
                                                        枚数の選択：
                                                        <select name="ticket" id="">
                                                            <option value="1" name="ticket">1</option>
                                                            <option value="2" name="ticket">2</option>
                                                            <option value="3" name="ticket">3</option>
                                                            <option value="4" name="ticket">4</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-4">
                                                        <input type="submit" class="w-100 btn btn-primary"
                                                            value="PayPayで購入手続きへ">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="p-5 text-center profile_detail">
                                    <table class="mb-5 profile_table">
                                        <tbody>
                                            <tr>
                                                <td class="py-3">名前</td>
                                                <td class="pl-4 py-3">{{ $user->first_name }}
                                                    {{ $user->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-3">カナ</td>
                                                <td class="pl-4 py-3">{{ $user->first_name_ruby }}
                                                    {{ $user->last_name_ruby }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-3">ニックネーム</td>
                                                <td class="pl-4 py-3">{{ $user->nickname }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-3">メールアドレス</td>
                                                <td class="pl-4 py-3">{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-3">性別</td>
                                                <td class="pl-4 py-3">{{ $user->sex }}</td>
                                            </tr>
                                            @if ($user->role_id == 3)
                                                <tr>
                                                    <td class="py-3">勤務先</td>
                                                    <td class="pl-4 py-3">{{ $user->company }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-3">部署</td>
                                                    <td class="pl-4 py-3">{{ $user->department }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-3">勤務年数</td>
                                                    <td class="pl-4 py-3">{{ $user->working_period }}年</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <a href="{{ route('user_edit', ['id' => $user->id]) }}"
                                        class="px-5 py-2 edit-button">情報を更新する</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
