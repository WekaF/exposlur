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
         $this->call(UsersSeeder::class);
         $this->call(BukusSeeder::class);
         $this->call(RolesSeeder::class);
         $this->call(KategorisSeeder::class);
         $this->call(TransaksisSeeder::class);
    }
}
