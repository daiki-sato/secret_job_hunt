<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetCompany extends Controller
{
    public function search($keyword)
    {
        $app_id = env('TAX_AGENCY_APPLICATION_ID');
        $company_name = urlencode($keyword);
        $api_url = 'https://api.houjin-bangou.nta.go.jp/4/name' .
        '?id=' . $app_id . // アプリケーションID
        '&name=' . $company_name . // URLエンコードした会社名（検索）
        '&change=1' . // 過去の情報も含める
        '&type=02'; // Unicode
        '&mode=2'; // 部分一致検索

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $api_url);
        $response->getStatusCode(); // 200
        $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
        $csv_data = $response->getBody();

        $data = [];
        $loop = 0;
        $fp = tmpfile();
        fwrite($fp, $csv_data);
        fseek($fp, 0);

        while ($company_data = fgetcsv($fp)) {
            if ($loop > 0) {
                $data[] = [
                    'id' => $company_data[1], // 法人番号
                    'name' => $company_data[6], // 法人名,
                    'post_code' => $company_data[15], // 所在地（郵便番号）,
                    'prefecture' => $company_data[9], // 所在地（都道府県）,
                    'city' => $company_data[10], // 所在地（市区町村）,
                    'street' => $company_data[11], // 所在地（丁目番地等）,
                    'address' => $company_data[9] . $company_data[10] . $company_data[11],
                ];
            }
            $loop++;
        }
        return $data;
    }
}