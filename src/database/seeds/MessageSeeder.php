<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->truncate();

        $params = [
            [
                'thread_id' => 1,
                'sender_id' => Role::getIntervieweeId(),
                'message' => '転職について悩んでいます。よろしくお願いします！',
            ],
            [
                'thread_id' => 1,
                'sender_id' => Role::getSolverId(),
                'message' => 'よろしくお願いします。お役にてるようがんばります！',
            ],
            [
                'thread_id' => 1,
                'sender_id' => Role::getIntervieweeId(),
                'message' => 'この日程でお願いします。',
            ],
            [
                'thread_id' => 2,
                'sender_id' => Role::getIntervieweeId(),
                'message' => '転職について悩んでいます。お世話になります。',
            ],
            [
                'thread_id' => 2,
                'sender_id' => Role::getSolverId(),
                'message' => 'よろしくお願いします。',
            ],
            [
                'thread_id' => 3,
                'sender_id' => Role::getIntervieweeId(),
                'message' => '転職について悩んでいます。よろしくお願いします！',
            ],
            [
                'thread_id' => 3,
                'sender_id' => Role::getSolverId(),
                'message' => 'よろしくお願いします。解決できるようにがんばります！',
            ],
            [
                'thread_id' => 4,
                'sender_id' => Role::getIntervieweeId(),
                'message' => '転職先について相談したいです。よろしくお願いします。',
            ],
            [
                'thread_id' => 4,
                'sender_id' => Role::getSolverId(),
                'message' => 'よろしくお願いします。',
            ],
            [
                'thread_id' => 5,
                'sender_id' => Role::getIntervieweeId(),
                'message' => '転職について相談したいです。よろしくお願いします！',
            ],
            [
                'thread_id' => 5,
                'sender_id' => Role::getSolverId(),
                'message' => 'お願いいたします。',
            ],
            [
                'thread_id' => 6,
                'sender_id' => Role::getIntervieweeId(),
                'message' => '転職について悩んでいます。よろしくお願いします！',
            ],
            [
                'thread_id' => 6,
                'sender_id' => Role::getSolverId(),
                'message' => 'お願いいたします',
            ],
        ];
        DB::table('messages')->insert($params);
    }
}