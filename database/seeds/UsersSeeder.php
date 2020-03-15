<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@perpus.com',
                'id_role' => 1,
                'password' => bcrypt('perpus123'), // secret
                'image' => 'user.png'
            ],[
                'name' => 'User',
                'email' => 'user@perpus.com',
                'id_role' => 2,
                'password' =>  bcrypt('perpus123'), // secret
                'image' => 'user.png'
            ],
        ];

        App\User::insert($user);

        factory(App\User::class, 5)->create();   
    }
}
