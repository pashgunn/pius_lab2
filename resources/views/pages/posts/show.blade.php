@extends('layouts.app')

@section('page.title', $post->name)

@section('content')

    <a href="{{ URL::previous() }}">
        {{ 'Назад' }}
    </a>

    <div>
        Теги статьи
        <div>
            @if($tags->isNotEmpty())
                @foreach($tags as $tag)
                    <div>
                        {{ $tag->name }}
                    </div>
                @endforeach
            @else
                {{ __('У статьи нет тегов') }}
            @endif
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item">id: {{ $post->id }}</li>
        <li class="list-group-item">name: {{ $post->name }}</li>
        <li class="list-group-item">slug: {{ $post->slug }}</li>
        <li class="list-group-item">description: {{ $post->description }}</li>
        <li class="list-group-item">author: {{ $post->author }}</li>
    </ul>
@endsection
