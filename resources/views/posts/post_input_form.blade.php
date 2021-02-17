<div class="mb-3">
    <label for="inputTitle" class="form-label">Название статьи</label>
    <input
        type="text"
        name="title"
        value="{{ old('title', $post->title) }}"
        class="form-control" id="inputTitle"
        placeholder="Введите название задачи"
    >
</div>
<div class="mb-3">
    <label for="inputDescription" class="form-label">Краткое описание статьи</label>
    <input
        type="text"
        name="description"
        value="{{ old('description', $post->description) }}"
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
    >{{ old('text', $post->text) }}</textarea>
</div>
<div class="mb-3">
    <label for="inputSlug" class="form-label">Символьный код</label>
    <input
        type="text"
        name="slug"
        value="{{ old('slug', $post->slug) }}"
        class="form-control"
        id="inputText"
        placeholder="Введите символьный код статьи"
    >
</div>
<div class="form-group form-check">
    <input
        type="checkbox"
        name="status"
        class="form-check-input"
        id="exampleCheck1"
        {{ old('status', $post->status) ? 'checked' : '' }}
    >
    <label class="form-check-label" for="exampleCheck1">Опубликовать статью?</label>
</div>
