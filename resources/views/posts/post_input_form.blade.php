<div class="mb-3">
    <label for="inputTitle" class="form-label">Название статьи</label>
    <input
        type="text"
        name="title"
        value="{{$post->title ? $post->title : old('title')}}"
        class="form-control" id="inputTitle"
        placeholder="Введите название задачи"
    >
</div>
<div class="mb-3">
    <label for="inputDescription" class="form-label">Краткое описание статьи</label>
    <input
        type="text"
        name="description"
        value="{{$post->description ? $post->description : old('description')}}"
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
    >{{$post->text ? $post->description : old('text')}}</textarea>
</div>
<div class="mb-3">
    <label for="inputSlug" class="form-label">Символьный код</label>
    <input
        type="text"
        name="slug"
        value="{{$post->slug ? $post->slug : old('slug')}}"
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
        {{ $post->status ? 'checked' : '' }}
    >
    <label class="form-check-label" for="exampleCheck1">Опубликовать статью?</label>
</div>
