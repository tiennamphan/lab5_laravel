<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $genres = DB::table('genes')->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->text(25),
                'poster' => 'https://tailieutienganh.edu.vn/public/files/upload/default/images/FILM-3.jpg',
                'intro' => $faker->text(50),
                'release_date' => $faker->date(),
                'genre_id' => $genres->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
