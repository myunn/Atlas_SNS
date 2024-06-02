<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //下記にコード記述？
        DB::table('authors')->insert([
            [''],
        ]);
    }
}
