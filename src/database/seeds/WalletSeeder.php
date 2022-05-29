<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wallets')->truncate();

        $params = [
            [
                'user_id' => 1,
                'balance' => 1200,
            ],
            [
                'user_id' => 2,
                'balance' => 4800,
            ],
            [
                'user_id' => 3,
                'balance' => 2400,
            ],
            [
                'user_id' => 4,
                'balance' => 12000,
            ],
        ];
        DB::table('wallets')->insert($params);
    }
}
