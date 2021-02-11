@extends('layouts.master')
    @section('description', 'Более подробная информация о нас')
    @section('title', 'О нас')

    @section('content')
        <div class="col-md-8 blog-main">
            <h3 class="pb-4 mb-4 font-italic border-bottom">
                @yield('title')
            </h3>

            <div class="blog-post">
                @yield('description')
            </div>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
            </nav>
        </div>
    @endsection
