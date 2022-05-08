<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->truncate();

        $params = [
            [
                'user_id' => 1,
                'contact_type' => 'その他',
                'comment' => 'その他のお問い合わせです。',
                'contact_date' => '2022-05-21 22:10:00',
            ],
            [
                'user_id' => 1,
                'contact_type' => '返金について',
                'comment' => '返金お願いします',
                'contact_date' => '2022-05-21 22:10:00',
            ],
            [
                'user_id' => 2,
                'contact_type' => 'その他',
                'comment' => 'その他のお問い合わせです。',
                'contact_date' => '2022-05-21 22:10:00',
            ],
            [
                'user_id' => 2,
                'contact_type' => '返金について',
                'comment' => '返金お願いします',
                'contact_date' => '2022-05-21 22:10:00',
            ],
            [
                'user_id' => 3,
                'contact_type' => 'その他',
                'comment' => 'その他のお問い合わせです。',
                'contact_date' => '2022-05-21 22:10:00',
            ],
            [
                'user_id' => 4,
                'contact_type' => '返金について',
                'comment' => '返金お願いします',
                'contact_date' => '2022-05-21 22:10:00',
            ],
            [
                'user_id' => 5,
                'contact_type' => 'その他',
                'comment' => 'その他のお問い合わせです。',
                'contact_date' => '2022-05-21 22:10:00',
            ],
            [
                'user_id' => 6,
                'contact_type' => '返金について',
                'comment' => '返金お願いします',
                'contact_date' => '2022-05-21 22:10:00',
            ],
        ];
        DB::table('contacts')->insert($params);
    }
}