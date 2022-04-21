<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterviewTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interview_times')->truncate();

        $params = [
            [
                'interview_id' => 1,
                'is_agreement' => true,
                'from_what_time' => '2022-05-21 22:00:00',
                'to_what_time' => '2022-05-21 22:10:00',
            ],
            [
                'interview_id' => 1,
                'is_agreement' => false,
                'from_what_time' => '2022-05-22 21:00:00',
                'to_what_time' => '2022-05-22 22:10:00',
            ],
            [
                'interview_id' => 1,
                'is_agreement' => false,
                'from_what_time' => '2022-05-20 22:00:00',
                'to_what_time' => '2022-05-20 22:10:00',
            ],
            [
                'interview_id' => 2,
                'is_agreement' => true,
                'from_what_time' => '2022-05-23 12:00:00',
                'to_what_time' => '2022-05-23 12:10:00',
            ],
            [
                'interview_id' => 2,
                'is_agreement' => false,
                'from_what_time' => '2022-05-22 21:00:00',
                'to_what_time' => '2022-05-22 22:10:00',
            ],
            [
                'interview_id' => 3,
                'is_agreement' => null,
                'from_what_time' => '2022-05-23 12:00:00',
                'to_what_time' => '2022-05-23 12:10:00',
            ],
            [
                'interview_id' => 3,
                'is_agreement' => null,
                'from_what_time' => '2022-05-22 21:00:00',
                'to_what_time' => '2022-05-22 22:10:00',
            ],
            [
                'interview_id' => 4,
                'is_agreement' => true,
                'from_what_time' => '2022-04-21 12:00:00',
                'to_what_time' => '2022-04-21 12:10:00',
            ],
        ];
        DB::table('interview_times')->insert($params);
    }
}