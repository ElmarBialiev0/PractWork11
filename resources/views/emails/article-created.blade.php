
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новая статья</title>
</head>
<body>
    <h1>Добавлена новая статья!</h1>

    <h2>{{ $article->title }}</h2>

    <p>{{ $article->description }}</p>

    <p>
        <strong>Автор:</strong> {{ $article->author }}
    </p>

    <p>
        Статья успешно добавлена на сайт.
    </p>
</body>
</html>
