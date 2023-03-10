<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home');

Route::get('posts',        ['uses' => 'PostController@index', 'as' => 'posts.index']);
Route::get('posts/{post}', ['uses' => 'PostController@show',  'as' => 'posts.show']);
