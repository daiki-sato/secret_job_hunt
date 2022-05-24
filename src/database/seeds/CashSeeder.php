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
        $params = [];
        DB::table('cashes')->insert($params);
    }
}
