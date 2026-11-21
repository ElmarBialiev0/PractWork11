
@extends('layouts.main')

@section('title', 'Редактировать новость')

@section('content')
<div class="container">
    <h1 class="mb-4">Редактировать новость</h1>

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('articles.form', [
            'buttonText' => 'Сохранить изменения'
        ])
    </form>
</div>
@endsection
