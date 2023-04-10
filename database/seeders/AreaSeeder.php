<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'area' => '東京'
        ]);
        Area::create([
            'area' => '大阪'
        ]);
        Area::create([
            'area' => '福岡'
        ]);
    }
}
