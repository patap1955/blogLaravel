<?php
$data = (object) [
    'title' => 'Контакты',
    'description' => 'Наши контакты и форма обратной связи'
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

        <div class="blog-post">
            {{ $data->description }}

            <h3 class="pb-4 mb-4 font-italic border-bottom">
                Форма обратной связи
            </h3>

            @include('layouts.errors')

            <form method="post" action="/feedbacks">
                @csrf
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">E-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="inputEmail" placeholder="Введите ваш E-mail">
                </div>
                <div class="mb-3">
                    <label for="inputBody" class="form-label">Текст обращения</label>
                    <input type="text" name="text" value="{{ old('text') }}" class="form-control" id="inputBody" placeholder="Введите текс обращения">
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
        </nav>
    </div>
@endsection

