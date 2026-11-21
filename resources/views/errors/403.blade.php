
@extends('layouts.main')

@section('title', 'Доступ запрещён')

@section('content')
<div class="container text-center py-5">
    <h1 class="display-1 fw-bold text-danger">403</h1>

    <h2>Доступ запрещён</h2>

    <p class="text-muted mt-3">
        {{ $exception->getMessage() ?: 'У вас недостаточно прав для выполнения этого действия.' }}
    </p>

    <a href="{{ route('home') }}" class="btn btn-primary mt-3">
        Вернуться на главную
    </a>
</div>
@endsection
