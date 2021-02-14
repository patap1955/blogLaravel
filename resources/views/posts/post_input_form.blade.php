<div class="mb-3">
    <label for="inputTitle" class="form-label">Название статьи</label>
    <input
        type="text"
        name="title"
        value=@if(isset($post)) "{{ $post->title }}" @else "{{ old('title') }}" @endif
        class="form-control" id="inputTitle"
        placeholder="Введите название задачи"
    >
</div>
<div class="mb-3">
    <label for="inputDescription" class="form-label">Краткое описание статьи</label>
    <input
        type="text"
        name="description"
        value=@if(isset($post)) "{{ $post->description }}" @else "{{ old('description') }}" @endif
        class="form-control"
        id="inputDescription"
        placeholder="Введите краткое описание статьи"
    >
</div>
<div class="mb-3">
    <label for="inputText" class="form-label">Детальное описание статьи</label>
    <textarea
        class="form-control"
        id="inputText" name="text"
        placeholder="Введите детальное описание статьи"
    >@if(isset($post)){{ $post->text }}@else{{ old('text') }}@endisset</textarea>
</div>
<div class="mb-3">
    <label for="inputSlug" class="form-label">Символьный код</label>
    <input
        type="text"
        name="slug"
        value=@if(isset($post)) "{{ $post->slug }}" @else "{{ old('slug') }}" @endif
        class="form-control"
        id="inputText"
        placeholder="Введите символьный код статьи"
        @isset($post) disabled @endisset
    >
</div>
<div class="form-group form-check">
    <input
        type="checkbox"
        name="status"
        class="form-check-input"
        id="exampleCheck1"
        @isset($post) {{ $post->status ? 'checked' : '' }} @endisset
    >
    <label class="form-check-label" for="exampleCheck1">Опубликовать статью?</label>
</div>
