<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\WeightLog;
class WeightLogSampleSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
         $log = [
          ['id' =>'1','date_key' => '1','weight' => '1'],
        ];
        DB::table('weight_log')->insert($log);
   }
}
