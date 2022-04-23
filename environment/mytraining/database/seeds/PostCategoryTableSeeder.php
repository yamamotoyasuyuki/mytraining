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
          ['id' => '1', 'user_id' =>'1', 'body_part_id' =>'1', 'name' => 'ベンチプレス'],
          ['id' => '2', 'user_id' =>'1', 'body_part_id' =>'1', 'name' => 'ペックフライ'],
          ['id' => '3', 'user_id' =>'1', 'body_part_id' =>'1', 'name' => 'コンバージング・チェスト・プレス'],
          ['id' => '4', 'user_id' =>'1', 'body_part_id' =>'1', 'name' => 'インクラインスミスマシン'],
          ['id' => '5', 'user_id' =>'1', 'body_part_id' =>'2', 'name' => 'アームカール'],
          ['id' => '6', 'user_id' =>'1', 'body_part_id' =>'2', 'name' => 'バーベル・カール'],
          ['id' => '7', 'user_id' =>'1', 'body_part_id' =>'2', 'name' => 'ダンベル・カール'],
          ['id' => '8', 'user_id' =>'1', 'body_part_id' =>'2', 'name' => 'ハンマーカール'],
          ['id' => '9', 'user_id' =>'1', 'body_part_id' =>'3', 'name' => 'クランチ'],
          ['id' => '10','user_id' =>'1', 'body_part_id' =>'3', 'name' => 'シットアップ'],
          ['id' => '11','user_id' =>'1', 'body_part_id' =>'4', 'name' => 'スクワット'],
          ['id' => '12','user_id' =>'1', 'body_part_id' =>'4', 'name' => 'レッグ・プレス'],
        ];
        DB::table('post_categories')->insert($postcategories);
        
    }
}