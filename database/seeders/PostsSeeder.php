<?php

namespace Database\Seeders;

use App\Models\ChatPost;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChatPost::factory(50)->create();

    }
}
