
@extends('layouts.main')

@section('title', 'Добавить новость')

@section('content')
<div class="container">
    <h1 class="mb-4">Добавить новость</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        @include('articles.form', [
            'buttonText' => 'Добавить новость'
        ])
    </form>
</div>
@endsection
