
@extends('layouts.main')

@section('title', 'Модерация комментариев')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Модерация комментариев</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @forelse($comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $comment->user->name ?? $comment->user->email }}</h5>

                <p>{{ $comment->content }}</p>

                <small class="text-muted">
                    Статья: {{ $comment->article->title ?? 'Неизвестно' }}
                </small>

                <div class="d-flex gap-2 mt-3">
                    <form action="{{ route('comments.approve', $comment) }}" method="POST">
                        @csrf
                        <button class="btn btn-success">Принять</button>
                    </form>

                    <form action="{{ route('comments.reject', $comment) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Отклонить</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p>Нет комментариев, ожидающих модерации.</p>
    @endforelse
</div>
@endsection
