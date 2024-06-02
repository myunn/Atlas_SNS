<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 最初にあった記述：$this->call(UsersTableSeeder::class);
        // 記述：初期ユーザーデータ用の記載
                 Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('mail');
            $table->string('password');
        });
    }
}
