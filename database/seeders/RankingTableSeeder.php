<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ranking;

class RankingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ranking::factory()->count(8)->create();
    }
}
