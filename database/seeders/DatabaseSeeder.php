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
        DB::table('categories')->insert(['id'=>1,'category_name'=>'Thông báo chung','topic_id'=>1]);
        DB::table('categories')->insert(['id'=>2,'category_name'=>'Nội quy forum','topic_id'=>1]);
        DB::table('categories')->insert(['id'=>3,'category_name'=>'Giải đáp chung','topic_id'=>2]);
        DB::table('categories')->insert(['id'=>4,'category_name'=>'Chia sẻ chung','topic_id'=>3]);
    }
}
