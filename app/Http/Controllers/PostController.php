<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $pagination = Post::with('tags')->paginate(3);
        $posts = $pagination->items();
        return view('pages.posts.index', compact('posts', 'pagination'));
    }

    public function show(Post $post): View
    {
        return view('pages.posts.show', compact('post'));
    }
}
