
@extends('layouts.main')

@section('title', 'Новости')

@section('content')
<div class="container">

    <h1 class="text-center mb-4">Новости</h1>

    {{-- Сообщение об успешном действии --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Закрыть">
            </button>
        </div>
    @endif

    {{-- Кнопка добавления новости --}}
    <div class="mb-4">
        <a href="{{ route('articles.create') }}" class="btn btn-success">
            + Добавить новость
        </a>
    </div>

    {{-- Список новостей --}}
    <div class="row">
        @forelse($articles as $article)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">

                    @if($article->image)
                        <img src="{{ $article->image }}"
                             class="card-img-top"
                             alt="{{ $article->title }}"
                             style="height: 220px; object-fit: cover;">
                    @endif

                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title">
                            {{ $article->title }}
                        </h5>

                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($article->description, 150) }}
                        </p>

                        <p class="text-muted mt-auto">
                            Автор: {{ $article->author }}
                        </p>

                        {{-- Кнопки управления --}}
                        <div class="d-flex flex-wrap gap-2 mt-3">

                            <a href="{{ route('articles.show', $article->id) }}"
                               class="btn btn-primary btn-sm">
                                Подробнее
                            </a>

                            <a href="{{ route('articles.edit', $article->id) }}"
                               class="btn btn-warning btn-sm">
                                Редактировать
                            </a>

                            <form action="{{ route('articles.destroy', $article->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Вы действительно хотите удалить эту новость?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Удалить
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Новостей пока нет. Добавьте первую новость!
                </div>
            </div>
        @endforelse
    </div>

    {{-- Пагинация --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $articles->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
