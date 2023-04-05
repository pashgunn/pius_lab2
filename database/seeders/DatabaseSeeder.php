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
        $posts = Post::factory()->count(100)->create();
        $tags = Tag::factory()->count(100)->create();

        $posts->each( function ($post) use ($tags) {
            $post->tags()->attach($tags->random(rand(1, 5)));
        });
    }
}
