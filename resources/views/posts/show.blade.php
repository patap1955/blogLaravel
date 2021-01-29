@extends('layouts.master')
@section('description', $post->description)
@section('title', $post->title)
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            {{ $post->title }}
        </h3>

        <div class="blog-post">
            {{ $post->text }}
        </div>

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="/">На главную</a>
        </nav>
    </div>
@endsection

