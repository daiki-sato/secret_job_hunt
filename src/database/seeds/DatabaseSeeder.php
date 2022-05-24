<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // マスターテーブルの作成
        $this->call([
            RoleTableSeeder::class,
        ]);

        $this->call([
            CallSeeder::class,
            UserTableSeeder::class,
            MessageSeeder::class,
            InterviewSeeder::class,
            InterviewTimeSeeder::class,
            WalletSeeder::class,
            ThreadSeeder::class,
            ContactSeeder::class,
            CashSeeder::class,
        ]);
    }
}