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
           ['body_part_id' => '01','post_category_id' => '1' ],
           ['body_part_id' => '02','post_category_id' => '2' ],
           ['body_part_id' => '03','post_category_id' => '3' ],
           ['body_part_id' => '04','post_category_id' => '4' ],
        ];
        DB::table('body_part_post_categories')->insert($middlebodypart);

    }
}
