
@extends('layouts.main')

@section('title', 'Регистрация')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Регистрация</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('signin.registration') }}" method="POST">

                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    Имя
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control"
                                    placeholder="Введите имя"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control"
                                    placeholder="Введите email"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Пароль
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Введите пароль"
                                    required
                                >
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Зарегистрироваться
                            </button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
