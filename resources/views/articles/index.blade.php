
@extends('layouts.main')

@section('title', 'Новости')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Новости</h1>

        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if($article->image)
                            <img src="{{ $article->image }}"
                                 class="card-img-top"
                                 alt="{{ $article->title }}"
                                 style="height: 220px; object-fit: cover;">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $article->title }}
                            </h5>

                            <p class="card-text">
                                {{ $article->description }}
                            </p>

                            <p class="text-muted">
                                Автор: {{ $article->author }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
