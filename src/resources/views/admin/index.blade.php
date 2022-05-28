@extends('layouts.admin')

@section('content')
    <div class="row admin-index">
        <div class="col-3 px-0 menu">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link py-2 my-0 h2 active menu_item" id="v-pills-payment-tab" data-toggle="pill"
                    href="#v-pills-payment" role="tab" aria-controls="v-pills-payment" aria-selected="true"><i
                        class="pr-2 fa-brands fa-paypal"></i>支払い状況</a>
                <a class="nav-link py-2 my-0 h2 menu_item" id="v-pills-exchange-tab" data-toggle="pill"
                    href="#v-pills-exchange" role="tab" aria-controls="v-pills-exchange" aria-selected="false"><i
                        class="pr-2 fa-solid fa-money-bill-1"></i>換金状況</a>
                <a class="nav-link py-2 my-0 h2 menu_item" id="v-pills-contact-tab" data-toggle="pill"
                    href="#v-pills-contact" role="tab" aria-controls="v-pills-contact" aria-selected="false"><i
                        class="pr-2 fa-solid fa-comment-dots"></i>お問合せ</a>
            </div>
        </div>
        <div class="px-0 col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade menu_content show active" id="v-pills-payment" role="tabpanel"
                    aria-labelledby="v-pills-payment-tab">
                    <div class="p-5 admin-wrapper">
                        <div class="p-5 m-5 admin-inner">
                            <h2 class="pt-2 pb-5">支払い状況</h2>
                            <table class="w-100 profile_table">
                                <tbody class="text-center">
                                    <tr class="p-3 mx-3 my-5 chart-top">
                                        <td class="px-4 py-3">名前</td>
                                        <td class="px-4 py-3">チケット枚数</td>
                                        <td class="px-4 py-3">金額</td>
                                        <td class="px-4 py-3">日時</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade menu_content" id="v-pills-exchange" role="tabpanel"
                    aria-labelledby="v-pills-exchange-tab">
                    <div class="p-5 admin-wrapper">
                        <div class="p-5 m-5 admin-inner">
                            <h2 class="pt-2 pb-5">換金管理</h2>
                            <table class="w-100 profile_table">
                                <tbody class="text-center">
                                    <tr class="p-3 mx-3 my-5 chart-top">
                                        <td class="px-4 py-3">名前</td>
                                        <td class="px-4 py-3">換金ポイント</td>
                                        <td class="px-4 py-3">日時</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade menu_content" id="v-pills-contact" role="tabpanel"
                    aria-labelledby="v-pills-contact-tab">
                    <div class="p-5 admin-wrapper">
                        <div class="p-5 m-5 admin-inner">
                            <h2 class="pt-2 pb-5">お問合せ</h2>
                            <table class="w-100 profile_table">
                                <tbody class="text-center">
                                    <tr class="p-3 mx-3 my-5 chart-top">
                                        <td class="px-4 py-3">お問合せ日時</td>
                                        <td class="px-4 py-3">名前</td>
                                        <td class="px-4 py-3">メアド</td>
                                        <td class="px-4 py-3">電話番号</td>
                                        <td class="px-4 py-3">項目</td>
                                        <td class="px-4 py-3">メッセージ内容</td>
                                        <td class="px-4 py-3">対応状況</td>
                                    </tr>
                                    <form action="{{ route('save') }}" method="POST">
                                        @csrf
                                        @foreach ($users as $user)
                                            @foreach ($user->contacts()->orderBy('contact_date', 'desc')->get()
        as $contact)
                                                <tr class="p-3 mx-3 my-5 chart-top">
                                                    <td class="px-4 py-3">
                                                        {{ $contact->contact_date->format('Y-m-d H:i') }}</td>
                                                    <td class="px-4 py-3">
                                                        {{ $user->first_name }}{{ $user->last_name }}
                                                    </td>
                                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                                    <td class="px-4 py-3">{{ $user->phone_number }}</td>
                                                    <td class="px-4 py-3">{{ $contact->contact_type }}</td>
                                                    <td class="px-4 py-3">{{ $contact->comment }}</td>
                                                    <td class="px-4 py-3">
                                                        <input {{ $contact->is_read == 1 ? 'checked' : '' }}
                                                            type="checkbox" id="" name="status[]"
                                                            value={{ $contact->id }}>
                                                        <label for="status"></label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                </tbody>
                            </table>
                            <button class="btn-dark" type="submit">送信する</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
