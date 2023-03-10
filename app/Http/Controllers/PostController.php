<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Post;
use Illuminate\View\View;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PostController extends Controller
{
    public function index(FilterRequest $filterRequest): View
    {
        $filters = $filterRequest->validated();
        $pagination = QueryBuilder::for(Post::class)
            ->allowedFilters(['slug', 'name', AllowedFilter::exact('tags.name')])
            ->paginate(3);

        $posts = $pagination->items();
        return view('pages.posts.index', compact('posts', 'pagination', 'filters'));
    }

    public function show(Post $post): View
    {
        $tags = $post->tags()->orderBy('name')->get();
        return view('pages.posts.show', compact('post', 'tags'));
    }
}
