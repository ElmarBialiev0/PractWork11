
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Мой сайт на Laravel')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .pagination {
            gap: 6px;
        }

        .pagination .page-link {
            border: none;
            border-radius: 8px;
            color: #495057;
            padding: 9px 15px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .pagination .page-link:hover {
            background-color: #e9ecef;
            color: #0d6efd;
        }

        .pagination .page-item.active .page-link {
            background-color: #0d6efd;
            color: white;
            box-shadow: 0 2px 6px rgba(13, 110, 253, 0.25);
        }

        .pagination .page-item.disabled .page-link {
            background-color: #f8f9fa;
            color: #adb5bd;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="{{ route('home') }}">
                Мой сайт
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu"
                    aria-expanded="false"
                    aria-label="Открыть меню">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            Главная
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">
                            О нас
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts') }}">
                            Контакты
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('galery', 0) }}">
                            Галерея
                        </a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('articles.index') }}">
                                Новости
                            </a>
                        </li>

                        @can('moderate-comments')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('comments.moderation') }}">
                                    Модерация комментариев
                                </a>
                            </li>
                        @endcan

                        <li class="nav-item">
                            <span class="nav-link text-info">
                                {{ auth()->user()->name }}
                            </span>
                        </li>

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf

                                <button type="submit" class="btn btn-outline-light btn-sm ms-lg-2">
                                    Выйти
                                </button>
                            </form>
                        </li>

                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('signin.create') }}">
                                Регистрация
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-primary btn-sm ms-lg-2" href="{{ route('login') }}">
                                Войти
                            </a>
                        </li>

                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">
                Биалиев Эльмар | 257-321
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
