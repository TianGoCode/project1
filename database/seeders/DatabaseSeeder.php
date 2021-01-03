<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('topics')->insert(['id'=>1,'topic_name'=>'Thông báo và nội quy chung']);
        DB::table('topics')->insert(['id'=>2,'topic_name'=>'Góc học tập']);
        DB::table('topics')->insert(['id'=>3,'topic_name'=>'Đời sống sinh viên']);
    }
}
