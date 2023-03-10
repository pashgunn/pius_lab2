@extends('layouts.app')

@section('page.title', 'Посты')

@section('content')
    <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
        <form action="{{ route('posts.index') }}" method="get">
                    <ul class="text-sm">
                        <p class="text-xl text-black font-bold mb-4">Фильтры</p>
                        <x-input id="inputSlug" name="filter[slug]" value="{{ old('filter.slug') }}" placeholder="slug"/>
                        <x-input id="inputName" name="filter[name]" value="{{ old('filter.name') }}" placeholder="name"/>
                        <x-input id="inputTags" name="filter[tags.name]" value="{{ old('filter.tags.name') }}" placeholder="tags"/>
                        <x-button/>
                    </ul>
        </form>

        <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">

            @foreach($posts as $post)
                <ul class="list-group">
                    <a href="{{ route('posts.show', $post->slug) }}"
                       class="list-group-item list-group-item-action">id: {{ $post->id }}</a>
                    <li class="list-group-item">name: {{ $post->name }}</li>
                    <li class="list-group-item">slug: {{ $post->slug }}</li>
                    <li class="list-group-item">description: {{ $post->description }}</li>
                    <li class="list-group-item">author: {{ $post->author }}</li>
                </ul>
            @endforeach

            {{$pagination->withQueryString()->links()}}
        </div>
    </div>
@endsection
