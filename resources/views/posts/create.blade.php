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
                <div class="mb-3">
                    <label for="inputTitle" class="form-label">Название статьи</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="inputTitle" placeholder="Введите название задачи">
                </div>
                <div class="mb-3">
                    <label for="inputDescription" class="form-label">Краткое описание статьи</label>
                    <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="inputDescription" placeholder="Введите краткое описание статьи">
                </div>
                <div class="mb-3">
                    <label for="inputText" class="form-label">Детальное описание статьи</label>
                    <input type="text" name="text" value="{{ old('text') }}" class="form-control" id="inputText" placeholder="Введите детальное описание статьи">
                </div>
                <div class="mb-3">
                    <label for="inputSlug" class="form-label">Символьный код</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" id="inputText" placeholder="Введите символьный код статьи">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Опубликовать статью?</label>
                </div>
                <button type="submit" class="btn btn-primary">Создать задачу</button>
            </form>
        </div>
    </div>
@endsection

