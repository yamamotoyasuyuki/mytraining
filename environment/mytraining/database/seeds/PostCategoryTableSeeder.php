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
           ['id' => '1', 'name' => 'ベンチプレス'],
           ['id' => '2', 'name' => 'ペックフライ'],
           ['id' => '3', 'name' => 'スミスマシンデクラインプレス'],
           ['id' => '4', 'name' => 'インクラインスミスマシン'],
        ];
        DB::table('post_categories')->insert($postcategories);
        
    }
}