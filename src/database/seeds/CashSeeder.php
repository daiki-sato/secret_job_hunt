<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cashes')->truncate();

        $params = [
            [
                'user_id' => 1,
                'value' => '111',
                'status' => 'その他のお問い合わせです。',
                'commission' => '250',
                'is_read' => '0',
                'created_at' => '2022-05-21 22:10:00',
                'updated_at' => '2022-05-21 22:10:00',
            ],
            [
                'user_id' => 2,
                'value' => '333',
                'status' => 'その他のお問い合わせです。',
                'commission' => '250',
                'is_read' => '1',
                'created_at' => '2022-05-21 22:10:00',
                'updated_at' => '2022-05-21 22:10:00',
            ],
            [
                'user_id' => 3,
                'value' => '333',
                'status' => 'その他のお問い合わせです。',
                'commission' => '250',
                'is_read' => '1',
                'created_at' => '2022-05-21 22:10:00',
                'updated_at' => '2022-05-21 22:10:00',
            ],
           
        ];
        DB::table('cashes')->insert($params);
        
    }
}
