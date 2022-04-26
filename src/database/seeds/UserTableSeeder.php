<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $params = [
            [
                'email' => 'mrp415@gmail.com',
                'password' => bcrypt('password'),
                'first_name' => "森",
                'last_name' => "遥",
                'first_name_ruby' => "モリ",
                'last_name_ruby' => "ハルカ",
                'nickname' => "mrp",
                'sex' => "女",
                'role_id' => Role::getIntervieweeId(),
                'company' => null,
                'department' => null,
                'working_period' => null,
            ],
            [
                'email' => 'daiki@com',
                'password' => bcrypt('password'),
                'first_name' => "佐藤",
                'last_name' => "大暉",
                'first_name_ruby' => "サトウ",
                'last_name_ruby' => "ダイキ",
                'nickname' => "だいきん",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "株式会社アンチパターン",
                'department' => "エンジニア部門",
                'working_period' => "2",
            ],
            [
                'email' => 'mayuna@com',
                'password' => bcrypt('password'),
                'first_name' => "石田",
                'last_name' => "麻由奈",
                'first_name_ruby' => "イシダ",
                'last_name_ruby' => "マユナ",
                'nickname' => "べびーしぇまゆな",
                'sex' => "女",
                'role_id' => Role::getIntervieweeId(),
                'company' => null,
                'department' => null,
                'working_period' => null,
            ],
            [
                'email' => 'hina@com',
                'password' => bcrypt('password'),
                'first_name' => "高橋",
                'last_name' => "日奈",
                'first_name_ruby' => "タカハシ",
                'last_name_ruby' => "ヒナ",
                'nickname' => "ぴな",
                'sex' => "女",
                'role_id' => Role::getSolverId(),
                'company' => "株式会社アンチパターン",
                'department' => "カルチャー部門",
                'working_period' => "1",
            ],
        ];
        DB::table('users')->insert($params);
    }
}
