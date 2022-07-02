<?php

namespace Database\Seeders;

use Database\Factories\PostFactory;
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
        $this->call(UserTableSeeder::class);
        $this->call(RankingTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(VoteTableSeeder::class);
        $this->call(CommentTableSeeder::class);
    }
}
