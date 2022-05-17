<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

// paypay関係
use Illuminate\Support\Facades\Auth;
use PayPay\OpenPaymentAPI\Client;
use PayPay\OpenPaymentAPI\Models\CreateQrCodePayload;
use PayPay\OpenPaymentAPI\Models\OrderItem;

class PaymentController extends Controller
{
    public function paypay(Request $request)
    {
        // .envファイルに書いておく
        $client = new Client([
            'API_KEY' => env('PAYPAY_API_KEY'),
            'API_SECRET' => env('PAYPAY_API_SECRET'),
            'MERCHANT_ID' => env('PAYPAY_MERCHANT_ID'),
        ], false);

        // paypayの支払いサイトが完了したら、リダイレクトされるURL
        // ブラウザの戻るボタンで戻っても、支払いIDが決済完了になっているので３秒後にリダイレクトされ直すだけ
        $rediect_url = 'http://localhost/my-page';

        //-------------------------------------
        // 商品情報を生成する
        //-------------------------------------
        $num_tickets = $request->ticket;

        $items = (new OrderItem())
            ->setName('請求額')
            ->setQuantity(1)
            ->setUnitPrice(['amount' => 1200 * $num_tickets, 'currency' => 'JPY']);

        //-------------------------------------
        // QRコードを生成する
        //-------------------------------------
        $payload = new CreateQrCodePayload();
        $payload->setOrderItems($items);
        $payload->setMerchantPaymentId("mpid_" . rand()); // 同じidを使いまわさないこと！
        $payload->setCodeType("ORDER_QR");
        $payload->setAmount(["amount" => 1200 * $num_tickets, "currency" => "JPY"]);
        $payload->setRedirectType('WEB_LINK');
        $payload->setIsAuthorization(false);
        $payload->setRedirectUrl($rediect_url);
        $payload->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $QRCodeResponse = $client->code->createQRCode($payload);
        if ($QRCodeResponse['resultInfo']['code'] !== 'SUCCESS') {
            echo ("QRコード生成エラー");
            return;
        }

        // paypayの支払いページに行く。支払いが終わったら$payload->setRedirectUrlにリダイレクトされる
        return redirect($QRCodeResponse['data']['url']);
        // 支払いIDはデータベースに保存しておく
        $merchantPaymentId = $QRCodeResponse['data']['merchantPaymentId'];

        //var_dump($QRCodeResponse);

        //-------------------------------------
        // 決済情報を取得する
        //-------------------------------------
        $QRCodeDetails = $client->payment->getPaymentDetails($merchantPaymentId);
        if ($QRCodeDetails['resultInfo']['code'] !== 'SUCCESS') {
            echo ("決済情報取得エラー");
            return;
        }

        $wallet = Wallet::where('user_id', Auth::id());
        $wallet_sum = $wallet->value('balance');

        if ($QRCodeDetails['data']['status'] == 'COMPLETED') {
            $wallet->update([
                'balance' => $wallet_sum + 1200 * $num_tickets,
            ]);
        }
    }
    public function paypay_thanks()
    {
        return 'paypay支払い完了！<br><a href="home">戻る</a>';
    }
}