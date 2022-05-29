@extends('layouts.app')

@section('content')
    <div class="px-5 py-3 mypage-index">
        <div class="p-4 mypage-container">
            <div class="m-5 mypage-container_top">
                <a href="{{ route('contact') }}" class="mr-5 contact-title">お問い合せ</a>
            </div>
            <div class="py-4 m-2 d-flex mypage-wrapper">
                <div class="mx-5 text-center profile_top">
                    <img src="{{ asset('img/profileimage.png') }}" alt="profile_img" class="profile_img">
                </div>
                <div class="px-5 mx-5 mypage-right">
                    <p class="h4 text-left">{{ $user->nickname }}</p>
                    @if ($user->role_id == 3)
                        <div class="text-left mypage_evaluation">
                            <div class="my-4 pt-4 d-flex justify-content-left align-items-end evaluation">
                                <i class="px-1 fa-regular fa-thumbs-up fa-3x thumbs-up"></i>
                                <span
                                    class="mr-3 px-2 h2">{{ $user->calls->where('evaluation', true)->count('evaluation') }}</span>
                                <i class="px-1 pb-2 fa-regular fa-thumbs-down fa-1x thumbs-down"></i>
                                <span
                                    class="m-0 px-2 pb-2 d-inline-block">{{ $user->calls->where('evaluation', false)->count('evaluation') }}</span>
                            </div>
                            <a href="{{ route('evaluation-comment') }}" class="h5 evaluation-comment">コメントを表示</a>
                        </div>
                    @endif
                    <div class="py-4 my-5 mypage-detail">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mypage-tab active text-info" id="wallet-tab" data-toggle="tab"
                                    href="#wallet" role="tab" aria-controls="wallet" aria-selected="true">
                                    @if ($user->role_id == 2)
                                        チケット枚数
                                    @else
                                        獲得金額
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mypage-tab text-info" id="profile-tab" data-toggle="tab" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false">登録情報</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="wallet" role="tabpanel" aria-labelledby="wallet-tab">
                                <div class="p-5 mt-4 ticket_detail d-block">
                                    @if ($user->role_id == 2)
                                        <p class="m-0 h4 ticket_number">{{ $balance / 1200 }}枚</p>
                                        <button class="px-5 mx-4 mt-2 py-2 exchange-button btn btn-danger" type="button"
                                            data-toggle="modal" data-target="#exampleModalCenter">
                                            チケットの購入
                                        </button>
                                    @else
                                        @if (session('flash_message'))
                                            <div class="flash_message text-success font-weight-bold mb-3">
                                                {{ session('flash_message') }}
                                            </div>
                                        @endif
                                        <p class="m-0 h4 ticket_number">{{ $balance / 1.2 }}円</p>
                                        <button class="px-5 mx-4 mt-3 py-2 exchange-button btn btn-danger" type="button"
                                            data-toggle="modal" data-target="#pointtomoney">
                                            換金申請
                                        </button>
                                    @endif
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
                                {{-- モーダル終了 --}}
                                {{-- modal --}}
                                <div class="modal fade" id="pointtomoney" tabindex="-1" role="dialog"
                                    aria-labelledby="pointtomoneyTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="pointtomoneyTitle">換金申請</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img class="img-fluid h-50 w-50 " src="{{ asset('img/paypay_1.jpg') }}"
                                                    alt="">
                                                <p>月末に毎月15日までに換金申請されたものをご登録された電話番号宛にpaypayでお支払いします。</p>
                                                <p>5000円以上の換金で、手数料無料（通常：220円）</p>
                                                <form action="{{ route('toMoney') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="money_value" value="{{ $balance / 1.2 }}">
                                                    <input type="hidden" name="status" value="apply">
                                                    @isset($apply)
                                                        <p class="text-success">申請済です<br>次の換金は翌月分でお願いします</p>
                                                    @else
                                                        <button class="btn-dark" type="submit">申請する</button>
                                                    @endisset
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- MOdal --}}
                            </div>
                            <table class="w-100 cash_table">
                                <tbody class="text-center">
                                    <tr class="p-3 mx-3 my-5 chart-top">
                                        <td class="px-4 py-3">申請日時</td>
                                        <td class="px-4 py-3">換金額</td>
                                        <td class="px-4 py-3">手数料</td>
                                        <td class="px-4 py-3">対応状況</td>
                                    </tr>
                                    @foreach ($apply_hostories as $apply_hostory)
                                        <tr class="p-3 mx-3 my-5 chart-top">
                                            <td class="px-4 py-3">
                                                {{ $apply_hostory->created_at->format('Y-m-d H:i') }}</td>
                                            <td class="px-4 py-3">{{ $apply_hostory->value }}</td>
                                            <td class="px-4 py-3">{{ $apply_hostory->commission }}</td>
                                            <td class="px-4 py-3">{{ $apply_hostory->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                                                <td class="py-3">電話番号</td>
                                                <td class="pl-4 py-3">{{ $user->phone_number }}</td>
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
