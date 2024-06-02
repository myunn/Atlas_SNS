<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期ユーザーの登録
        DB::table('users')->insert([
            [
                'username' => 'おためし',
                'mail' => 'otameshi@gmail.com',
                'password' => bcrypt('otameshi11'),
            ]
        ]);
    }
}
