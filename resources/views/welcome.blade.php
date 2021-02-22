@extends('layouts.master')
    @section('description', 'Главная страница сайта blog.laravel')
    @section('title', 'Главная')
    @section('content')
        <div class="col-md-8 blog-main">
            <h3 class="pb-4 mb-4 font-italic border-bottom">
                @yield('title')
            </h3>
            @foreach($posts as $post)
                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="{{ route('posts.show', ['post' => $post->slug]) }}">{{ $post->title }}</a></h2>
                    <p class="blog-post-meta">{{ $post->created_at }}<a href="#">Mark</a></p>
                    @include('layouts.tags_show', ['tags' => $post->tags])
                    {{ $post->description }}
                </div>
            @endforeach
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
            </nav>
        </div>
    @endsection
