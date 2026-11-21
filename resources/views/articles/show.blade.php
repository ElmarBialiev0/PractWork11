
@extends('layouts.main')

@section('title', $article->title)

@section('content')
<div class="container">
    <div class="card shadow">
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
</div>
@endsection
