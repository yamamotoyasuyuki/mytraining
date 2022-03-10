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
           ['id' => '1', 'name' => '胸'],
           ['id' => '2', 'name' => '腕'],
           ['id' => '3', 'name' => '腹'],
           ['id' => '4', 'name' => '脚'],
        ];
        DB::table('body_parts')->insert($bodyparts);
        
    }
}
