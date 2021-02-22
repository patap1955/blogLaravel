@extends('layouts.master')
@section('description', $post->description)
@section('title', $post->title)
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            {{ $post->title }}
        </h3>
        @can('update', $post)
            <a href="{{ route('posts.edit', ['post' => $post->slug]) }}">Редактировать статью</a>
        @endcan
        <div class="blog-post">
            @include('layouts.tags_show', ['tags' => $post->tags])
            {{ $post->text }}
        </div>
        @can('update', $post)
            <a href="{{ route('posts.edit', ['post' => $post->slug]) }}">Редактировать статью</a>
        @endcan

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="/">На главную</a>
        </nav>
    </div>
@endsection

