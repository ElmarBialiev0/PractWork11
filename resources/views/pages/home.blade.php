
@extends('layouts.main')

@section('title', 'Главная страница')

@section('content')
    <h1 class="text-center mb-4">Новости и статьи</h1>

    <div class="row">
        @foreach($articles as $id => $article)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">

                    <a href="{{ route('galery', $id) }}">
                        <img
                            src="{{ asset($article['preview_image']) }}"
                            class="card-img-top"
                            alt="{{ $article['name'] }}"
                            style="height: 220px; object-fit: cover;"
                        >
                    </a>

                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $article['name'] }}
                        </h5>

                        <p class="text-muted">
                            {{ $article['date'] }}
                        </p>

                        <p class="card-text">
                            {{ $article['shortDesc'] ?? $article['desc'] }}
                        </p>

                        <a href="{{ route('galery', $id) }}"
                           class="btn btn-primary">
                            Подробнее
                        </a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
