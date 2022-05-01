<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interviews')->truncate();

        $params = [
            [
                'user_id' => 1,
                'solver_id' => 2,
            ],
            [
                'user_id' => 1,
                'solver_id' => 4,
            ],
            [
                'user_id' => 3,
                'solver_id' => 2,
            ],
            [
                'user_id' => 3,
                'solver_id' => 4,
            ],
        ];
        DB::table('interviews')->insert($params);
    }
}