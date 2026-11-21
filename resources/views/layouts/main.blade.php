
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #212529;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">Мой сайт</a>

                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                    <a class="nav-link" href="{{ route('about') }}">О нас</a>
                    <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Основная часть -->
    <main class="container py-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p class="mb-0">Биалиев Эльмар | 257-321</p>
    </footer>

</body>
</html>
