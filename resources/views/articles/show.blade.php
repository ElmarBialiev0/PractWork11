
@extends('layouts.main')

@section('title', $article->title)

@section('content')
<div class="container">

    @php
        $approvedComments = $article->comments
            ->where('is_approved', true);
    @endphp

    {{-- Карточка новости --}}
    <div class="card shadow mb-4">

        @if($article->image)
            <img src="{{ $article->image }}"
                 class="card-img-top"
                 alt="{{ $article->title }}"
                 style="max-height: 400px; object-fit: cover;">
        @endif

        <div class="card-body">
            <h1>{{ $article->title }}</h1>

            <p>{{ $article->description }}</p>

            <p class="text-muted">
                Автор: {{ $article->author }}
            </p>

            <a href="{{ route('articles.index') }}" class="btn btn-secondary">
                Назад к новостям
            </a>
        </div>
    </div>

    {{-- Сообщения об успешных действиях --}}
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

    {{-- Ошибки валидации --}}
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{-- Комментарии --}}
    <div class="card shadow mb-4">
        <div class="card-header">
            <h4 class="mb-0">
                Комментарии ({{ $approvedComments->count() }})
            </h4>
        </div>

        <div class="card-body">

            @forelse($approvedComments as $comment)
                <div class="border rounded p-3 mb-3">

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong>
                            {{ $comment->user->name ?? $comment->user->email ?? 'Пользователь' }}
                        </strong>

                        <small class="text-muted">
                            {{ $comment->created_at->format('d.m.Y H:i') }}
                        </small>
                    </div>

                    <p class="mb-2">
                        {{ $comment->content }}
                    </p>

                    {{-- Удаление комментария: только модератор --}}
                    @can('delete', $comment)
                        <form action="{{ route('comments.destroy', $comment->id) }}"
                              method="POST"
                              onsubmit="return confirm('Удалить этот комментарий?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Удалить
                            </button>
                        </form>
                    @endcan

                </div>
            @empty
                <p class="text-muted text-center mb-0">
                    Пока одобренных комментариев нет. Будьте первым!
                </p>
            @endforelse

        </div>
    </div>

    {{-- Форма добавления комментария --}}
    @auth
        <div class="card shadow mb-4">
            <div class="card-header">
                <h4 class="mb-0">Оставить комментарий</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('comments.store', $article->id) }}"
                      method="POST">

                    @csrf

                    <div class="mb-3">
                        <label for="content" class="form-label">
                            Ваш комментарий
                        </label>

                        <textarea name="content"
                                  id="content"
                                  class="form-control @error('content') is-invalid @enderror"
                                  rows="4"
                                  placeholder="Введите текст комментария..."
                                  required>{{ old('content') }}</textarea>

                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Отправить комментарий
                    </button>

                </form>

            </div>
        </div>
    @else
        <div class="alert alert-info">
            Чтобы оставить комментарий, необходимо
            <a href="{{ route('login') }}">войти</a> в аккаунт.
        </div>
    @endauth

</div>
@endsection
