<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="text-muted" href="#">Subscribe</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="#">Large</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                </a>


                @guest
                    @if (Route::has('login'))
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                    @endif

                    @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                    @endif
                @else
                        <a id="navbarDropdown" class="nav-link" href="{{ route('user_posts.index') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Выход') }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                @endguest


            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="{{ route('index') }}">Главная</a>
            <a class="p-2 text-muted" href="{{ route('about') }}">О нас</a>
            <a class="p-2 text-muted" href="{{ route('contacts') }}">Контакты</a>
            @if(auth()->id())
                <a class="p-2 text-muted" href="{{ route('posts.create') }}">Создать статью</a>
            @endif
            <a class="p-2 text-muted" href="{{ route('admin.feedbacks') }}">Админ раздел</a>
        </nav>
    </div>
</div>
