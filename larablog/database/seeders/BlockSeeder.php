<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = Topic::all();
        $topic1 = $topics->find(2);
        $topic2 = $topics->find(15);
        Block::factory()->count(3)->for($topic1)->create();
        Block::factory()->count(3)->for($topic2)->create();
    }
}
