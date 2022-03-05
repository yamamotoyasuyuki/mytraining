<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BodyPartTableSeeder::class);
        $this->call(PostCategoryTableSeeder::class);
        $this->call(BodyPartPostCategorySeeder::class);
    }
}
