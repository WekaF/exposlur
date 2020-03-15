<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'id_role' => 2,
        'password' => bcrypt('perpus123'), // secret
        'remember_token' => Str::random(40),
    ];
});

$factory->define(App\Buku::class,function (Faker $faker){
    return [
        'isbn' => $faker->unique()->isbn13,
        'judul' => $faker->catchPhrase,
        'id_kategori' => rand(1,4),
        'pengarang' => $faker->name,
        'penerbit' => $faker->company,
        'tahun' => $faker->year($max = 'now'), 
        'stok' => 20,
        'image' => 'cover.png'
    ];
});

$factory->define(App\Transaksi::class,function (Faker $faker){
    return [
        'id_buku' => rand(1, 50),
        'id_user' => rand(3, 10),
        'tgl_pinjam' => date('Y-m-d H:i:s'),
        'tgl_kembali' => 'Masih dipinjam'
    ];
});