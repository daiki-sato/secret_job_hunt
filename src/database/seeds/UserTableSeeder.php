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
                'password' => 'password',
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
                'password' => 'password',
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
                'password' => 'password',
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
                'password' => 'password',
                'first_name' => "高橋",
                'last_name' => "日奈",
                'first_name_ruby' => "タカハシ",
                'last_name_ruby' => "ヒナ",
                'nickname' => "ぴな",
                'sex' => "女",
                'role_id' => Role::getSolverId(),
                'company' => "株式会社アンチパターン",
                'department' => "カルチャー部門",
                'working_period' => 1,
            ],
            [
                'email' => 'kotani@com',
                'password' => 'password',
                'first_name' => "小谷",
                'last_name' => "ユウイチ",
                'first_name_ruby' => "コタニ",
                'last_name_ruby' => "ユウイチ",
                'nickname' => "こたにさん",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "株式会社アンチパターン",
                'department' => "エンジニア部門",
                'working_period' => 12,
            ],
            [
                'email' => 'neko@com',
                'password' => 'password',
                'first_name' => "猫",
                'last_name' => "はっち",
                'first_name_ruby' => "ネコ",
                'last_name_ruby' => "ハッチ",
                'nickname' => "はっち！",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "株式会社ネコ",
                'department' => "ネコ部門",
                'working_period' => 10,
            ],
            [
                'email' => 'nobu@com',
                'password' => 'password',
                'first_name' => "岩永",
                'last_name' => "信之",
                'first_name_ruby' => "イワナガ",
                'last_name_ruby' => "ノブユキ",
                'nickname' => "のぶさん",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "株式会アクセンチュア",
                'department' => "人事部門",
                'working_period' => 20,
            ],
            [
                'email' => 'yuyama@com',
                'password' => 'password',
                'first_name' => "湯山",
                'last_name' => "智晴",
                'first_name_ruby' => "ユヤマ",
                'last_name_ruby' => "トモハル",
                'nickname' => "ともくん",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "ランサーズ",
                'department' => "エンジニア部門",
                'working_period' => 1,
            ],
            [
                'email' => 'shuto@com',
                'password' => 'password',
                'first_name' => "吉岡",
                'last_name' => "姑",
                'first_name_ruby' => "ヨシオカ",
                'last_name_ruby' => "シュウト",
                'nickname' => "姑",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "楽天グループ株式会社",
                'department' => "エンジニア部門",
                'working_period' => 1,
            ],
            [
                'email' => 'ryo@com',
                'password' => 'password',
                'first_name' => "影島",
                'last_name' => "亮太郎",
                'first_name_ruby' => "カゲシマ",
                'last_name_ruby' => "リョウタロウ",
                'nickname' => "りょうちゃん",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "APPLE",
                'department' => "経営部門",
                'working_period' => 11,
            ],
        ];
        DB::table('users')->insert($params);
    }
}