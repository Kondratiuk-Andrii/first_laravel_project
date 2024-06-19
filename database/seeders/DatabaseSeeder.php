<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
        $tags = Tag::factory(20)->create();
        $posts = Post::factory(200)->create();

        foreach ($posts as $post) {
            $tagsIds = $tags->random(rand(0, 5))->pluck('id')->toArray();
            $post->tags()->attach($tagsIds);
        }
    }
}
