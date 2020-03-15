<?php

use Illuminate\Database\Seeder;

class BukusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Buku::class, 50)->create();
    }
}
