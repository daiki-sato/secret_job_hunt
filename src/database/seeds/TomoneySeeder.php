<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToMoneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('to_money')->truncate();
        $params = [];
        DB::table('to_money')->insert($params);
    }
}
