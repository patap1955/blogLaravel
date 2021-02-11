@extends('layouts.master')

@section('description', 'Страница администротирования сайта')
@section('title', 'Админ раздел')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            @yield('title')
        </h3>

        <div class="blog-post">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Текст сообщения</th>
                </tr>
                </thead>
                <tbody>
                @foreach($feedbacks as $feedback)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->created_at }}</td>
                    <td>
                        {{ $feedback->text }}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

