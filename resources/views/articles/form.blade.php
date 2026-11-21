
<div class="mb-3">
    <label for="title" class="form-label">Заголовок</label>
    <input
        type="text"
        name="title"
        id="title"
        class="form-control"
        value="{{ old('title', $article->title ?? '') }}"
        required
    >
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Ссылка на изображение</label>
    <input
        type="text"
        name="image"
        id="image"
        class="form-control"
        value="{{ old('image', $article->image ?? '') }}"
    >
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Описание</label>
    <textarea
        name="description"
        id="description"
        class="form-control"
        rows="5"
        required
    >{{ old('description', $article->description ?? '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="author" class="form-label">Автор</label>
    <input
        type="text"
        name="author"
        id="author"
        class="form-control"
        value="{{ old('author', $article->author ?? '') }}"
        required
    >
    @error('author')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">
    {{ $buttonText }}
</button>
<a href="{{ route('articles.index') }}" class="btn btn-secondary">
    Назад
</a>
