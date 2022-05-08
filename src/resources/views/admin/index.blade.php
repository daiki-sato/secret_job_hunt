@extends('layouts.admin')

@section('content')
    <div class="d-flex flex-row admin-index">
      <div class="p-5 menu">
        <input id="payment" type="radio" name="menu_item" checked>
        <label class="menu_item h2 py-4 d-block" for="payment"><i class="pr-2 fa-brands fa-paypal"></i>支払い状況</label>
        <input id="point-exchange" type="radio" name="menu_item">
        <label class="menu_item h2 py-4 d-block" for="point-exchange"><i class="pr-2 fa-solid fa-money-bill-1"></i>換金状況</label>
        <input id="contact" type="radio" name="menu_item">
        <label class="menu_item h2 py-4 d-block" for="contact"><i class="pr-2 fa-solid fa-comment-dots"></i>お問合せ</label>
      </div>
      <div class="menu_content" id="payment_content">
        <p>test</p>
      </div>
      <div class="menu_content" id="point-exchange_content">
        <div class="tab_content_description">
          <p class="c-txtsp">プログラミングの内容がここに入ります</p>
        </div>
      </div>
      <div class="menu_content" id="contact_content">
        <div class="p-5 admin-wrapper">
          <div class="p-5 m-5 admin-inner">
            <h2 class="pt-2 pb-5">お問合せ</h2>
            <table class="w-100 profile_table">
              <tbody class="text-center">
                  <tr class="p-3 mx-3 my-5 chart-top">
                      <td class="px-4 py-3">お問合せ日時</td>
                      <td class="px-4 py-3">名前</td>
                      <td class="px-4 py-3">項目</td>
                      <td class="px-4 py-3">メッセージ内容</td>
                      <td class="px-4 py-3">対応状況</td>
                  </tr>
                  <tr class="p-3 mx-3 my-5 chart-top">
                      <td class="px-4 py-3">お問合せ日時</td>
                      <td class="px-4 py-3">名前</td>
                      <td class="px-4 py-3">項目</td>
                      <td class="px-4 py-3">メッセージ内容</td>
                      <td class="px-4 py-3">対応状況</td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection
