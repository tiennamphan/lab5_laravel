<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneSeeder extends Seeder
{
    public function run()
    {
        DB::table('genes')->insert([
            ['name' => 'Hành động'],
            ['name' => 'Võ thuật'],
            ['name' => 'Hài'],
            ['name' => 'Kinh dị'],
            ['name' => 'Tâm lý'],
            ['name' => 'Viễn tưởng'],
            ['name' => 'Hoạt hình'],
        ]);
    }
}
