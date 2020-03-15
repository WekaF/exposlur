<?php

use Illuminate\Database\Seeder;

class TransaksisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Transaksi::class, 10)->create();
    }
}
