<?php

use Illuminate\Database\Seeder;
use App\Models\BodyPart;

class BodyPartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $bodyparts = [
           ['id' => '01', 'name' => '胸'],
           ['id' => '02', 'name' => '腕'],
           ['id' => '03', 'name' => '腹'],
           ['id' => '04', 'name' => '脚'],
        ];
        DB::table('body_parts')->insert($bodyparts);
        
    }
}
