@component('mail::message')
# Создана новая статья : {{ $post->title }}

{{ $post->description }}

@component('mail::button', ['url' => '/posts/' . $post->slug])
Посмотреть статью
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
