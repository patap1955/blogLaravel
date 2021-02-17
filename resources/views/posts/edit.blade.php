@extends('layouts.master')
@section('description', 'Страница редактирования статьи')
@section('title', 'Редактирование статьи')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            @yield('title') - <small>{{ $post->title }}</small>
        </h3>
        <div class="blog-post">
            @include('layouts.errors')
            <form method="POST" action="{{ route('posts.update', ['post' => $post->slug]) }}">
                @csrf
                @method('PATCH')
                @include('posts.post_input_form')
                <button type="submit" class="btn btn-primary">Редактировать статью</button>
            </form>

            <form method="post" action="{{ route('posts.destroy', ['post' => $post->slug]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить статью</button>
            </form>
        </div>
    </div>
@endsection


