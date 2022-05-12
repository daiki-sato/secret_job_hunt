@extends('layouts.admin')

@section('content')
<div class="row admin-index">
  <div class="col-3 px-0 menu">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link py-2 my-0 h2 active menu_item" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="pr-2 fa-brands fa-paypal"></i>支払い状況</a>
      <a class="nav-link py-2 my-0 h2 menu_item" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="pr-2 fa-solid fa-money-bill-1"></i>換金状況</a>
      <a class="nav-link py-2 my-0 h2 menu_item" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="pr-2 fa-solid fa-comment-dots"></i>お問合せ</a>
    </div>
  </div>
  <div class="px-0 col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade menu_content show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
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
      <div class="tab-pane fade menu_content" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
      <div class="tab-pane fade menu_content" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
    </div>
  </div>
</div>
@endsection

