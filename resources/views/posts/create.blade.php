@extends('layouts.master')
@section('description', 'Страница добавления статьи')
@section('title', 'Добавление статьи')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Страница создания статьи
        </h3>

        <div class="blog-post">
            @include('layouts.errors')
            <form method="post" action="{{ route('posts.store') }}">
                @csrf
                @include('posts.post_input_form')
                <button type="submit" class="btn btn-primary">Создать задачу</button>
            </form>
        </div>
    </div>
@endsection

