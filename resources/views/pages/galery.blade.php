
@extends('layouts.main')

@section('title', $article['name'])

@section('content')
    <div class="container">
        <h1 class="text-center mb-3">
            {{ $article['name'] }}
        </h1>

        <p class="text-center text-muted mb-4">
            {{ $article['date'] }}
        </p>

        <div class="text-center mb-4">
            <img
                src="{{ asset($article['full_image']) }}"
                alt="{{ $article['name'] }}"
                class="img-fluid rounded shadow"
                style="max-height: 600px;"
            >
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <p>{{ $article['desc'] }}</p>

                <a href="{{ route('home') }}" class="btn btn-secondary">
                    Вернуться на главную
                </a>
            </div>
        </div>
    </div>
@endsection
