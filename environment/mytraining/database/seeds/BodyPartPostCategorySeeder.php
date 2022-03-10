<?php

use Illuminate\Database\Seeder;

class BodyPartPostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $middlebodypart = [
           ['body_part_id' => '1','post_category_id' => '01' ],
           ['body_part_id' => '2','post_category_id' => '02' ],
           ['body_part_id' => '3','post_category_id' => '03' ],
           ['body_part_id' => '4','post_category_id' => '04' ],
        ];
        DB::table('body_part_post_categories')->insert($middlebodypart);

    }
}
