@component('mail::message')
# Удаленна статья : {{ $post->title }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
