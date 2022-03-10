<?php

use Illuminate\Database\Seeder;
use App\Models\PostCategory;

class PostCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $postcategories = [
           ['id' => '01', 'name' => 'ベンチプレス'],
           ['id' => '02', 'name' => 'アームカール'],
           ['id' => '03', 'name' => 'シットアップ'],
           ['id' => '04', 'name' => 'スクワット'],
        ];
        DB::table('post_categories')->insert($postcategories);
        
    }
}