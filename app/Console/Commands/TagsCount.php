<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Illuminate\Console\Command;

class TagsCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tag:count {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the number of articles linked to the tag with identifier $id';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $tagId = $this->argument('id');
        if ($tag = Tag::firstWhere('id', $tagId)) {
            $postCount = $tag->posts()->count();
            $this->line('Количество статей привязанных к тегу ' . $tag->name . ': ' . $postCount);
        } else {
            $this->error('Тега с id ' . $tagId . ' не существует');
        }

    }
}
