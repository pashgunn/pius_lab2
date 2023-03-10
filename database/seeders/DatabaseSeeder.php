<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $posts = Post::factory()->count(10)->create();
        $tags = Tag::factory()->count(20)->create();

        $tagsCount = rand(1, 5);
        $posts->each( function ($post) use ($tags, $tagsCount) {
            return $post->tags()->attach($tags->random($tagsCount));
        });
    }
}
