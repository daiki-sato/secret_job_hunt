<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TomoneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tomoneys')->truncate();
        $params = [];
        DB::table('tomoneys')->insert($params);
    }
}
