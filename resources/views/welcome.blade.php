<?php
$data = (object) [
    'title' => 'Главная',
    'description' => 'Главная страница сайта blog.laravel'
];
?>
@extends('layouts.master')
    @section('description', $data->description)
    @section('title', $data->title)
    @section('content')
        <div class="col-md-8 blog-main">
            <h3 class="pb-4 mb-4 font-italic border-bottom">
                {{ $data->title }}
            </h3>
            @foreach($posts as $post)
                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="{{ route('post.show', ['post' => $post->slug]) }}">{{ $post->title }}</a></h2>
                    <p class="blog-post-meta">{{ $post->created_at }}<a href="#">Mark</a></p>

                    {{ $post->description }}

                </div>
            @endforeach
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
            </nav>
        </div>
    @endsection
