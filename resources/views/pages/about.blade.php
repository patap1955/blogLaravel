<?php
$data = (object) [
    'title' => 'О нас',
    'description' => 'Более подробная информация о нас'
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
            </div>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
            </nav>
        </div>
    @endsection
